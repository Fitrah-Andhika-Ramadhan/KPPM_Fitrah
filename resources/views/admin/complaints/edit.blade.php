@extends('admin.layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title
            ">Edit Complaint</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Form to edit the content -->
            <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="form-group
                mt-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($complaint->image)
                        <img src="{{ asset('storage/complaints/' . $complaint->image) }}" class="img-thumbnail mt-2" width="200px">
                    @endif
                </div>
                <div class="form-group
                mt-3">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $complaint->link }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
