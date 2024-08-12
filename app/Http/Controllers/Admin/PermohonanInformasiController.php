<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PermohonanInformasiController extends Controller
{
    public function index()
    {
        $permohonanInformasis = PermohonanInformasi::all();
        return view('admin.permohonan_informasi.index', compact('permohonanInformasis'));
    }

    public function create()
    {
        return view('admin.permohonan_informasi.create');
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

        return redirect()->route('admin.permohonan_informasi.index')->with('success', 'Permohonan informasi berhasil dikirim.');
    }

    public function edit($id)
    {
        $permohonanInformasi = PermohonanInformasi::findOrFail($id);
        return view('admin.permohonan_informasi.edit', compact('permohonanInformasi'));
    }

    public function update(Request $request, $id)
    {
        $permohonanInformasi = PermohonanInformasi::findOrFail($id);

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

        $permohonanInformasi->update($validated);

        return redirect()->route('admin.permohonan_informasi.index')->with('success', 'Permohonan informasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $permohonanInformasi = PermohonanInformasi::findOrFail($id);
        if ($permohonanInformasi->upload_ktp) {
            Storage::disk('public')->delete($permohonanInformasi->upload_ktp);
        }
        $permohonanInformasi->delete();
        return redirect()->route('admin.permohonan_informasi.index')->with('success', 'Permohonan informasi berhasil dihapus.');
    }
}
