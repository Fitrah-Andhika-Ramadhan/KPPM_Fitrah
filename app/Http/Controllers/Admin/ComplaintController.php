<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('admin.complaints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaints', 'public');
            $data['image'] = $imagePath;
        }

        Complaint::create($data);

        return redirect()->route('admin.complaints.index')
                        ->with('success', 'Complaint created successfully.');
    }

    public function edit(Complaint $complaint)
    {
        return view('admin.complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
        
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaints', 'public');
            $data['image'] = $imagePath;
        }

        $complaint->update($data);

        return redirect()->route('admin.complaints.index')
                        ->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect()->route('admin.complaints.index')
                        ->with('success', 'Complaint deleted successfully.');
    }
}


