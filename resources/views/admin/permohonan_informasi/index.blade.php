@extends('admin.layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Permohonan Informasi List</h2>
    <a href="{{ route('admin.permohonan_informasi.create') }}" class="btn btn-primary mb-3">Create New</a>

    <!-- Kontrol Ukuran Konten -->
    <div class="mb-3">
        <button id="minimize-btn" class="btn btn-secondary">-</button>
        <button id="maximize-btn" class="btn btn-secondary">+</button>
    </div>

    <!-- Wrapper untuk scroll horizontal -->
    <div id="table-container" class="table-responsive">
        <table id="info-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Nama (Sesuai KTP)</th>
                <th>Email</th>
                <th>No KTP / NIK</th>
                <th>No HP / Kontak</th>
                <th>Alamat</th>
                <th>Nama Informasi yang Dibutuhkan</th>
                <th>Tujuan</th>
                <th>Upload KTP</th>
                <th>Cara Mendapatkan</th>
                <th>Lihat/Baca/Dengar/Catat</th>
                <th>Cara Memberikan</th>
                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permohonanInformasis as $permohonan_informasi)
            <tr>
                <td>{{ $permohonan_informasi->nama }}</td>
                <td>{{ $permohonan_informasi->email }}</td>
                <td>{{ $permohonan_informasi->no_ktp }}</td>
                <td>{{ $permohonan_informasi->no_hp }}</td>
                <td>{{ $permohonan_informasi->alamat }}</td>
                <td>{{ $permohonan_informasi->nama_informasi }}</td>
                <td>{{ $permohonan_informasi->tujuan }}</td>
                <td>{{ $permohonan_informasi->upload_ktp }}</td>
                <td>{{ $permohonan_informasi->cara_mendapatkan }}</td>
                <td>{{ $permohonan_informasi->lihat_baca_dengar_catat }}</td>
                <td>{{ $permohonan_informasi->cara_memberikan }}</td>
                
                <td>
                    <a href="{{ route('admin.permohonan_informasi.edit', $permohonan_informasi->id) }}">
                        <button type="button" class="btn btn-primary btn-fw">Edit</button>
                    </a>
                    <a href="{{ route('admin.permohonan_informasi.destroy', $permohonan_informasi->id) }}">
                        <button type="button" class="btn btn-danger btn-fw">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- CSS dan JavaScript dalam satu file Blade -->

<style>
/* CSS untuk tabel */
#table-container {
    transition: all 0.3s ease;
}

#table-container.small {
    max-height: 200px; /* Tinggi minimal */
    overflow-y: auto;
}

#table-container.large {
    max-height: none;
    overflow: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var minimizeBtn = document.getElementById('minimize-btn');
    var maximizeBtn = document.getElementById('maximize-btn');
    var tableContainer = document.getElementById('table-container');

    minimizeBtn.addEventListener('click', function () {
        tableContainer.classList.add('small');
        tableContainer.classList.remove('large');
    });

    maximizeBtn.addEventListener('click', function () {
        tableContainer.classList.remove('small');
        tableContainer.classList.add('large');
    });
});
</script>
@endsection
