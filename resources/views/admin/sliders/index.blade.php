@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Manage Sliders</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">Add New Slider</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td><img src="{{ asset('storage/' . $slider->image) }}" width="1000"></td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
