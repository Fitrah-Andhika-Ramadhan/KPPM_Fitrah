<?php

// Portfolio/app/Http/Controllers/Admin/GuestbookController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function index()
    {
        $guestbooks = Guestbook::all();
        return view('admin.guestbook.index', compact('guestbooks'));
    }

    public function create()
    {
        return view('admin.guestbook.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'personal_bidang' => 'required',
            'tujuan' => 'required',
        ]);

        Guestbook::create($request->all());
        return redirect()->route('admin.guestbook.index')->with('success', 'Guestbook berhasil dibuat.');
    }

    public function show($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        return view('admin.guestbook.show', compact('guestbook'));
    }

    public function edit($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        return view('admin.guestbook.edit', compact('guestbook'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'personal_bidang' => 'required',
            'tujuan' => 'required',
        ]);

        $guestbook = Guestbook::findOrFail($id);
        $guestbook->update($request->all());
        return redirect()->route('admin.guestbook.index')->with('success', 'Guestbook berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        $guestbook->delete();
        return redirect()->route('admin.guestbook.index')->with('success', 'Guestbook berhasil dihapus.');
    }
}
