@extends('admin.layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tentang Saya</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Form untuk menambahkan konten baru -->
            <form action="{{ route('admin.aboutme.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              
                <div class="form-group mt-3 justify-content-center">
                    <label for="content">Konten</label>
                    <textarea class="form-control summernote" id="content" name="content"></textarea>
                </div>

                
                <div class="form-group mt-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
                <div class="form-group mt-3">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
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
                console.log('Summernote initialized', $('.summernote').summernote('code'));
            },
            onChange: function(contents) {
                console.log('Content changed', contents);
            }
        }
    });
});
</script>
@endpush
