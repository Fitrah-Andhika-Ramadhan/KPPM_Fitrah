@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Video</h1>
        <form action="{{ route('admin.videos.update', $video) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" value="{{ $video->title }}" class="form-control" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="video_link" class="form-label">Video Link:</label>
                <input type="url" name="video_link" id="video_link" value="{{ $video->video_link }}" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Video</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
