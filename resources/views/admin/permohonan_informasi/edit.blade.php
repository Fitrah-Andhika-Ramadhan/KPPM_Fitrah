@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Permohonan Informasi</h1>
    <form action="{{ route('admin.permohonan_informasi.update', $permohonanInformasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $permohonanInformasi->nama }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $permohonanInformasi->email }}" required>
        </div>
        <div class="form-group">
            <label for="no_ktp">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $permohonanInformasi->no_ktp }}" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $permohonanInformasi->no_hp }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $permohonanInformasi->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="nama_informasi">Nama Informasi</label>
            <input type="text" class="form-control" id="nama_informasi" name="nama_informasi" value="{{ $permohonanInformasi->nama_informasi }}" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $permohonanInformasi->tujuan }}" required>
        </div>
        <div class="form-group">
            <label for="upload_ktp">Upload KTP</label>
            @if ($permohonanInformasi->upload_ktp)
                <p>File saat ini: <a href="{{ Storage::url($permohonanInformasi->upload_ktp) }}" target="_blank">{{ basename($permohonanInformasi->upload_ktp) }}</a></p>
            @endif
            <input type="file" class="form-control-file" id="upload_ktp" name="upload_ktp">
        </div>
        <div class="form-group">
            <label for="cara_mendapatkan">Cara Mendapatkan</label>
            <select class="form-control" id="cara_mendapatkan" name="cara_mendapatkan" required>
                <option value="lihat/baca/dengar/catat" {{ $permohonanInformasi->cara_mendapatkan == 'lihat/baca/dengar/catat' ? 'selected' : '' }}>Lihat/Baca/Dengar/Catat</option>
                <option value="mendapatkan salinan informasi" {{ $permohonanInformasi->cara_mendapatkan == 'mendapatkan salinan informasi' ? 'selected' : '' }}>Mendapatkan Salinan Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cara_memberikan">Cara Memberikan</label>
            <select class="form-control" id="cara_memberikan" name="cara_memberikan" required>
                <option value="mengambil langsung" {{ $permohonanInformasi->cara_memberikan == 'mengambil langsung' ? 'selected' : '' }}>Mengambil Langsung</option>
                <option value="email" {{ $permohonanInformasi->cara_memberikan == 'email' ? 'selected' : '' }}>Email</option>
                <option value="faksimili" {{ $permohonanInformasi->cara_memberikan == 'faksimili' ? 'selected'
