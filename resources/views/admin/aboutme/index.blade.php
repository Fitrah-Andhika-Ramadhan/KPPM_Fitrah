{{-- resources\views\admin\aboutme\index.blade.php --}}
@extends('admin.layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profil</h4>
            <a href="{{ route('admin.aboutme.create') }}" class="btn btn-primary mb-3">Tambah Profil Baru</a>
            <div class="row">
                @foreach($aboutme as $about)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            @if($about->image)
                                <img src="{{ asset('storage/aboutme/' . $about->image) }}" class="card-img-top" alt="{{ $about->content }}">
                            @endif
                            <div class="card-body">
                                <p class="card-text text-justify">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($about->content), 150, $end='...') }}
                                </p>
                                <p class="card-text">{{ $about->link }}</p>
                                <a href="{{ route('admin.aboutme.edit', $about->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('admin.aboutme.destroy', $about->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Include jQuery and Summernote JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet">

<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
        //justify
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onInit: function() {
                console.log('Summernote is launched');
            }
        }
    });
});
</script>
@endpush
