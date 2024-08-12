@extends('admin.layouts.admin')

@section('content')
<h1>Edit Portfolio Item</h1>

<form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $portfolio->title }}" required>
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="category" value="{{ $portfolio->category }}" required>
    </div>
    <div>
        <label>Image</label>
        <input type="file" name="image">
        <img src="{{ asset('storage/' . $portfolio->image) }}" width="100" alt="">
    </div>
    <div>
        <label>Link (Optional)</label>
        <input type="url" name="link" value="{{ $portfolio->link }}">
    </div>
    <button type="submit">Update Item</button>
</form>
@endsection