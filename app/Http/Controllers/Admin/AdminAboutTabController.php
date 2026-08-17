<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutTab;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AdminAboutTabController extends Controller
{
    public function index()
    {
        $aboutTabs = AboutTab::latest()->paginate(10);
        return view('admin.about-tab.index', compact('aboutTabs'));
    }

    public function create()
    {
        $aboutSections = AboutSection::orderBy('title')->get();
        return view('admin.about-tab.create', compact('aboutSections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_section_id' => 'required|exists:about_sections,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        AboutTab::create($validated);

        return redirect()->route('admin.about-tab.index')->with('success', 'About tab created successfully.');
    }

    public function show(AboutTab $aboutTab)
    {
        return view('admin.about-tab.show', compact('aboutTab'));
    }

    public function edit(AboutTab $aboutTab)
    {
        $aboutSections = AboutSection::orderBy('title')->get();
        return view('admin.about-tab.edit', compact('aboutTab', 'aboutSections'));
    }

    public function update(Request $request, AboutTab $aboutTab)
    {
        $validated = $request->validate([
            'about_section_id' => 'required|exists:about_sections,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $aboutTab->update($validated);

        return redirect()->route('admin.about-tab.index')->with('success', 'About tab updated successfully.');
    }

    public function destroy(AboutTab $aboutTab)
    {
        $aboutTab->delete();
        return redirect()->route('admin.about-tab.index')->with('success', 'About tab deleted successfully.');
    }
}
