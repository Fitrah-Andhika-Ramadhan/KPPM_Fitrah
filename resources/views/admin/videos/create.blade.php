@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add Video</h1>
        <form action="{{ route('admin.videos.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="video_link" class="form-label">Video Link:</label>
                <input type="url" name="video_link" id="video_link" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Video</button>
        </form>
    </div>
@endsection
