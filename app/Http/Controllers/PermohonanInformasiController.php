<?php

namespace App\Http\Controllers;

use App\Models\PermohonanInformasi;
use Illuminate\Http\Request;

class PermohonanInformasiController extends Controller
{
    public function create()
    {
        return view('permohonan_informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'nama_informasi' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'upload_ktp' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'cara_mendapatkan' => 'required|in:lihat/baca/dengar/catat,mendapatkan salinan informasi',
            'cara_memberikan' => 'required|in:mengambil langsung,email,faksimili,dikirim',
        ]);

        if ($request->hasFile('upload_ktp')) {
            $path = $request->file('upload_ktp')->store('ktp', 'public');
            $validated['upload_ktp'] = $path;
        }

        PermohonanInformasi::create($validated);

        return redirect()->route('permohonan_informasi.create')->with('success', 'Permohonan informasi berhasil dikirim.');
    }
}
