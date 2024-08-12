@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Portfolio Items</h1>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary mb-4">Add New Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ $portfolio->category }}</td>
                    <td><img src="{{ asset('storage/' . $portfolio->image) }}" width="100" alt=""></td>
                    <td><a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a></td>
                    <td>
                        <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
