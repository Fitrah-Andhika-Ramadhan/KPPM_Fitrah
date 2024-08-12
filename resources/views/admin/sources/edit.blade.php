@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Source</h2>
    <form action="{{ route('admin.sources.update', $source->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $source->title }}" required>
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" name="link" class="form-control" value="{{ $source->link }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="summernote" name="content" class="form-control">{{ $source->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            @if($source->image)
                <img src="{{ asset('storage/sources/' . $source->image) }}" class="img-thumbnail mt-2" width="200px">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300
    });
});
</script>
@endsection
