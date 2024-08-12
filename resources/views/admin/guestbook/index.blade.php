@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Guestbook Entries</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.guestbook.create') }}" class="btn btn-primary">Add New Entry</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Nama Perusahaan</th>
                <th>Alamat Perusahaan</th>
                <th>Personal/Bidang</th>
                <th>Tujuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guestbooks as $guestbook)
                <tr>
                    <td>{{ $guestbook->nama_lengkap }}</td>
                    <td>{{ $guestbook->nomor_telepon }}</td>
                    <td>{{ $guestbook->email }}</td>
                    <td>{{ $guestbook->nama_perusahaan }}</td>
                    <td>{{ $guestbook->alamat_perusahaan }}</td>
                    <td>{{ $guestbook->personal_bidang }}</td>
                    <td>{{ $guestbook->tujuan }}</td>
                    <td>
                        <a href="{{ route('admin.guestbook.edit', $guestbook->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.guestbook.destroy', $guestbook->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
