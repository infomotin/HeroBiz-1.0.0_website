<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AdminAboutSectionController extends Controller
{
    public function index()
    {
        $aboutSections = AboutSection::latest()->paginate(10);
        return view('admin.about-section.index', compact('aboutSections'));
    }

    public function create()
    {
        return view('admin.about-section.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        AboutSection::create($validated);

        return redirect()->route('admin.about-section.index')->with('success', 'About section created successfully.');
    }

    public function show(AboutSection $aboutSection)
    {
        $aboutSection->load('tabs');
        return view('admin.about-section.show', compact('aboutSection'));
    }

    public function edit(AboutSection $aboutSection)
    {
        return view('admin.about-section.edit', compact('aboutSection'));
    }

    public function update(Request $request, AboutSection $aboutSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $aboutSection->update($validated);

        return redirect()->route('admin.about-section.index')->with('success', 'About section updated successfully.');
    }

    public function destroy(AboutSection $aboutSection)
    {
        $aboutSection->delete();
        return redirect()->route('admin.about-section.index')->with('success', 'About section deleted successfully.');
    }
}
