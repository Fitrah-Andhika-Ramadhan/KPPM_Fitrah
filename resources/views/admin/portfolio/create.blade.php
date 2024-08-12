@extends('admin.layouts.admin')

@section('content')
<h1>Add New Portfolio Item</h1>

<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="category" required>
    </div>
    <div>
        <label>Image</label>
        <input type="file" name="image" required>
    </div>
    <div>
        <label>Link (Optional)</label>
        <input type="url" name="link">
    </div>
    <button type="submit">Add Item</button>
</form>
@endsection