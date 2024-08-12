@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Videos</h1>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary mb-3">Add Video</a>
        <div class="list-group">
            @foreach($videos as $video)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{ $video->title }}</h5>
                        <a href="{{ $video->video_link }}" class="text-decoration-none" target="_blank">{{ $video->video_link }}</a>
                    </div>
                    <div>
                        <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="d-inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
