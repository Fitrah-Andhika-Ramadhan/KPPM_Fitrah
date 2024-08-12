@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>Create New Source</h2>
    <form action="{{ route('admin.sources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" name="link" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="summernote" name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
