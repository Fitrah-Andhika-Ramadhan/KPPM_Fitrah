@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Create Guestbook Entry</h1>
    <form method="POST" action="{{ route('admin.guestbook.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
        </div>
        <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan</label>
            <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required>
        </div>
        <div class="form-group">
            <label for="personal_bidang">Personal/Bidang</label>
            <input type="text" class="form-control" id="personal_bidang" name="personal_bidang" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
