@extends('admin.layouts.admin')

@section('content')
    <h1>{{ isset($complaint) ? 'Edit Pengaduan' : 'Tambah Pengaduan' }}</h1>

    <form action="{{ isset($complaint) ? route('admin.complaints.store', $complaint->id) : route('admin.complaints.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($complaint))
            @method('PUT')
        @endif

        <div>
            <label for="image">Gambar:</label>
            <input type="file" name="image">
            @if(isset($complaint) && $complaint->image)
                <img src="{{ asset('storage/complaints/' . $complaint->image) }}" alt="{{ $complaint->title }}" width="100">
            @endif
        </div>

      
        <div>
            <label for="link">Link:</label>
            <input type="text" name="link" value="{{ isset($complaint) ? $complaint->link : old('link') }}">
        </div>
        <button type="submit">{{ isset($complaint) ? 'Update' : 'Submit' }}</button>
    </form>
@endsection
