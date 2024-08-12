<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class AboutMeController extends Controller
{
    // Method untuk menampilkan halaman "About Me"
    public function index()
    {
        $user = User::select(
            'id',
            'name',
            'email',
            'phone',
            'address',
            'job',
            'degree',
            'birth_day',
            'profile_pic',
            'experience'
            
        )->where('id', 1)->first();

        $aboutme = AboutMe::all();
        
        return view('admin.aboutme.index', compact('user', 'aboutme'));
    }

    // Method untuk menampilkan form create
    public function create()
    {
        return view('admin.aboutme.create');
    }

    // Method untuk menyimpan data "About Me" baru
    public function store(Request $request)
{
    $request->validate([
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'link' => 'required',
    ]);

    $aboutme = new AboutMe();
    $aboutme->content = Purifier::clean($request->content, 'custom');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/aboutme');
        $aboutme->image = basename($imagePath);
    }

    $aboutme->save();

    return redirect()->route('admin.aboutme.index')->with('success', 'Data "About Me" berhasil ditambahkan.');
}
    
    
    // Method untuk menampilkan form edit
    public function edit($id)
    {
        $aboutme = AboutMe::findOrFail($id);
        return view('admin.aboutme.edit', compact('aboutme'));
    }

    // Method untuk memperbarui data "About Me" yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $aboutme = AboutMe::findOrFail($id);
        $aboutme->content = Purifier::clean($request->content, 'custom');
    
        if ($request->hasFile('image')) {
            if ($aboutme->image) {
                Storage::delete('public/aboutme/' . $aboutme->image);
            }
            $imagePath = $request->file('image')->store('public/aboutme');
            $aboutme->image = basename($imagePath);
        }
    
        $aboutme->save();
    
        return redirect()->route('admin.aboutme.index')->with('success', 'Data "About Me" berhasil diperbarui.');
    }

    // Method untuk menghapus data "About Me"
    public function destroy($id)
    {
        $aboutme = AboutMe::findOrFail($id);

        if ($aboutme->image) {
            Storage::delete('public/aboutme/' . $aboutme->image);
        }

        $aboutme->delete();

        return redirect()->route('admin.aboutme.index')->with('success', 'Data "About Me" berhasil dihapus.');
    }

    // Method untuk memperbarui informasi profil user
    public function updateProfile(Request $request)
    {
        $user = User::first();
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'tittle' => 'required',
            //link boleh tidak diisi
            'link' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($user->profile_pic) {
                Storage::delete($user->profile_pic);
            }
            $get_new_file = $request->file('image')->store('images');
            $user->profile_pic = $get_new_file;
        }

        $user->update($validated);

        return redirect()->route('admin.aboutme.index')->with('message', 'Profil berhasil diperbarui.');
    }
}
