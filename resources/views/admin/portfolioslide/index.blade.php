@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h2>Portfolio Slides</h2>
    <a href="{{ route('admin.portfolioslide.create') }}" class="btn btn-primary mb-2">Add New Slider</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($slides)
                @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->title }}</td>
                    <td>
                        @if($slide->images)
                            @foreach($slide->images as $image)
                            <img src="{{ asset('storage/portfolio_slides/' . $image) }}" alt="" style="width: 100px">
                            @endforeach
                        @endif
                    </td>
                    <td>
                        
                        <a href="{{ route('admin.portfolioslide.edit', $slide->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.portfolioslide.destroy', $slide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No slides found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
