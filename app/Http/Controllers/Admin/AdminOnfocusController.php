<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnfocusSection;
use Illuminate\Http\Request;

class AdminOnfocusController extends Controller
{
    public function index()
    {
        $onfocusSections = OnfocusSection::latest()->paginate(10);
        return view('admin.onfocus.index', compact('onfocusSections'));
    }

    public function create()
    {
        return view('admin.onfocus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'checklist_items' => 'nullable|array',
            'checklist_items.*' => 'string',
            'video_url' => 'nullable|string|max:255',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        OnfocusSection::create($validated);

        return redirect()->route('admin.onfocus.index')->with('success', 'Onfocus section created successfully.');
    }

    public function show(OnfocusSection $onfocusSection)
    {
        return view('admin.onfocus.show', compact('onfocusSection'));
    }

    public function edit(OnfocusSection $onfocusSection)
    {
        return view('admin.onfocus.edit', compact('onfocusSection'));
    }

    public function update(Request $request, OnfocusSection $onfocusSection)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'checklist_items' => 'nullable|array',
            'checklist_items.*' => 'string',
            'video_url' => 'nullable|string|max:255',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $onfocusSection->update($validated);

        return redirect()->route('admin.onfocus.index')->with('success', 'Onfocus section updated successfully.');
    }

    public function destroy(OnfocusSection $onfocusSection)
    {
        $onfocusSection->delete();
        return redirect()->route('admin.onfocus.index')->with('success', 'Onfocus section deleted successfully.');
    }
}
