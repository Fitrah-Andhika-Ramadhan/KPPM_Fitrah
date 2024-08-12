@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Guestbook Entry</h1>
    <form method="POST" action="{{ route('admin.guestbook.update', $guestbook->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $guestbook->name }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $guestbook->nomor_telepon }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $guestbook->email }}" required>
        </div>
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $guestbook->nama_perusahaan }}" required>
        </div>
        <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan</label>
            <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ $guestbook->alamat_perusahaan }}" required>
        </div>
        <div class="form-group">
            <label for="personal_bidang">Personal/Bidang</label>
            <input type="text" class="form-control" id="personal_bidang" name="personal_bidang" value="{{ $guestbook->personal_bidang }}" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $guestbook->tujuan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
