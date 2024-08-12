<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioSlideController extends Controller
{
    public function index()
    {
        $slides = PortfolioSlide::all();
        return view('admin.portfolioslide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.portfolioslide.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $images = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/portfolio_slides');
            $images[] = basename($path);
        }
    }

    PortfolioSlide::create([
        'title' => $request->title,
        'images' => $images,
    ]);

    return redirect()->route('admin.portfolioslide.index')->with('success', 'Slide successfully added.');
}


    public function edit($id)
    {
        $slide = PortfolioSlide::findOrFail($id);
        return view('admin.portfolioslide.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slide = PortfolioSlide::findOrFail($id);
        $slide->title = $request->title;

        if ($request->hasFile('images')) {
            $existingImages = $slide->images ?? [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/portfolio_slides');
                $existingImages[] = basename($path);
            }
            $slide->images = $existingImages;
        }

        $slide->save();

        return redirect()->route('admin.portfolioslide.index')->with('success', 'Slide successfully updated.');
    }

    public function destroy($id)
    {
        $slide = PortfolioSlide::findOrFail($id);
        if ($slide->images) {
            foreach ($slide->images as $image) {
                Storage::delete('public/portfolio_slides/' . $image);
            }
        }
        $slide->delete();

        return redirect()->route('admin.portfolioslide.index')->with('success', 'Slide successfully deleted.');
    }
}
