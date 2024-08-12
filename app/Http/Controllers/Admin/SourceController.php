<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::all();
        return view('admin.sources.index', compact('sources'));
    }

    public function create()
    {
        return view('admin.sources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'nullable|url',
            'content' => 'nullable|string',
            //image
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Source::create($request->all());
        $data['content'] = Purifier::clean($request->input('content'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/sources');
            $data['image'] = basename($imagePath);
        }

        Source::create($data);

        return redirect()->route('admin.sources.index')
                        ->with('success', 'Source created successfully.');
    }

    public function edit(Source $source)
    {
        return view('admin.sources.edit', compact('source'));
    }

    public function update(Request $request, Source $source)
    {
        $request->validate([
            'title' => 'nullable',
            'link' => 'nullable|url',
            'content' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $source->update($request->all());
        $data['content'] = Purifier::clean($request->input('content'));

        $source->update($data);

        return redirect()->route('admin.sources.index')
                        ->with('success', 'Source updated successfully.');
    }

    public function destroy(Source $source)
    {
        $source->delete();

        return redirect()->route('admin.sources.index')
                        ->with('success', 'Source deleted successfully.');
    }
}
