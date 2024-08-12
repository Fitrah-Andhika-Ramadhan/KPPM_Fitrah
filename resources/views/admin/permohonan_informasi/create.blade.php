@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Buat Permohonan Informasi Baru</h1>
    <form action="{{ route('admin.permohonan_informasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="no_ktp">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
        <div class="form-group">
            <label for="nama_informasi">Nama Informasi</label>
            <input type="text" class="form-control" id="nama_informasi" name="nama_informasi" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        </div>
        <div class="form-group">
            <label for="upload_ktp">Upload KTP</label>
            <input type="file" class="form-control-file" id="upload_ktp" name="upload_ktp">
        </div>
        <div class="form-group">
            <label for="cara_mendapatkan">Cara Mendapatkan</label>
            <select class="form-control" id="cara_mendapatkan" name="cara_mendapatkan" required>
                <option value="lihat/baca/dengar/catat">Lihat/Baca/Dengar/Catat</option>
                <option value="mendapatkan salinan informasi">Mendapatkan Salinan Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cara_memberikan">Cara Memberikan</label>
            <select class="form-control" id="cara_memberikan" name="cara_memberikan" required>
                <option value="mengambil langsung">Mengambil Langsung</option>
                <option value="email">Email</option>
                <option value="faksimili">Faksimili</option>
                <option value="dikirim">Dikirim</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
