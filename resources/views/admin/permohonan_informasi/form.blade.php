@extends('admin.layouts.admin')

@section('content')
<div class="form-group">
    <label for="nama">Nama (Sesuai KTP)</label>
    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $permohonanInformasi->nama ?? '') }}" required>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $permohonanInformasi->email ?? '') }}" required>
</div>
<div class="form-group">
    <label for="no_ktp">No KTP / NIK</label>
    <input type="text" name="no_ktp" class="form-control" id="no_ktp" value="{{ old('no_ktp', $permohonanInformasi->no_ktp ?? '') }}" required>
</div>
<div class="form-group">
    <label for="no_hp">No HP / Kontak</label>
    <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp', $permohonanInformasi->no_hp ?? '') }}" required>
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea name="alamat" class="form-control" id="alamat" required>{{ old('alamat', $permohonanInformasi->alamat ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="nama_informasi">Nama Informasi yang Dibutuhkan</label>
    <input type="text" name="nama_informasi" class="form-control" id="nama_informasi" value="{{ old('nama_informasi', $permohonanInformasi->nama_informasi ?? '') }}">
</div>
<div class="form-group">
    <label for="tujuan">Tujuan</label>
    <input type="text" name="tujuan" class="form-control" id="tujuan" value="{{ old('tujuan', $permohonanInformasi->tujuan ?? '') }}" required>
</div>
<div class="form-group">
    <label for="upload_ktp">Upload KTP</label>
    <input type="file" name="upload_ktp" class="form-control-file" id="upload_ktp">
    @if(isset($permohonanInformasi) && $permohonanInformasi->upload_ktp)
        <a href="{{ asset('storage/' . $permohonanInformasi->upload_ktp) }}" target="_blank">View KTP</a>
    @endif
</div>
<div class="form-group">
    <label for="cara_mendapatkan">Cara Mendapatkan</label>
    <select name="cara_mendapatkan" class="form-control" id="cara_mendapatkan" required>
        <option value="lihat/baca/dengar/catat" {{ old('cara_mendapatkan', $permohonanInformasi->cara_mendapatkan ?? '') == 'lihat/baca/dengar/catat' ? 'selected' : '' }}>Lihat/Baca/Dengar/Catat</option>
        <option value="mendapatkan salinan informasi" {{ old('cara_mendapatkan', $permohonanInformasi->cara_mendapatkan ?? '') == 'mendapatkan salinan informasi' ? 'selected' : '' }}>Mendapatkan Salinan Informasi</option>
    </select>
</div>
<div class="form-group">
    <label for="cara_memberikan">Cara Memberikan</label>
    <select name="cara_memberikan" class="form-control" id="cara_memberikan" required>
        <option value="mengambil langsung" {{ old('cara_memberikan', $permohonanInformasi->cara_memberikan ?? '') == 'mengambil langsung' ? 'selected' : '' }}>Mengambil Langsung</option>
        <option value="email" {{ old('cara_memberikan', $permohonanInformasi->cara_memberikan ?? '') == 'email' ? 'selected' : '' }}>Email</option>
        <option value="faksimili" {{ old('cara_memberikan', $permohonanInformasi->cara_memberikan ?? '') == 'faksimili' ? 'selected' : '' }}>Faksimili</option>
        <option value="dikirim" {{ old('cara_memberikan', $permohonanInformasi->cara_memberikan ?? '') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@endsection
# {{-- resources\views\admin\permohonan_informasi\form.blade.php --}}

