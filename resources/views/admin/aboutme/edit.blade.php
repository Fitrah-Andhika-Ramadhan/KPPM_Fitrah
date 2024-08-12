@extends('admin.layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Tentang Saya</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Form untuk mengedit konten -->
            <form action="{{ route('admin.aboutme.update', $aboutme->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="form-group mt-3 justify-content-center">
                    <label for="content">Konten</label>
                    <textarea class="form-control summernote" id="content" name="content">{{ $aboutme->content }}</textarea>
                </div>
                    
                <div class="form-group mt-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $aboutme->link }}">
                </div>
                <div class="form-group mt-3">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($aboutme->image)
                        <img src="{{ asset('storage/aboutme/' . $aboutme->image) }}" class="img-thumbnail mt-2" width="200px">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
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







                <