@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Add New Slider</h1>
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Slider Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add Slider</button>
        </form>
    </div>
@endsection
