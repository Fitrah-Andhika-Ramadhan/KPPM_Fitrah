@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Slider</h1>
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Slider Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="{{ asset('storage/' . $slider->image) }}" width="100" class="mt-2">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title }}">
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $slider->subtitle }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Slider</button>
        </form>
    </div>
@endsection
