<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->paginate(10);
        return view('admin.feature.index', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'checklist_text' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['checklist_items'] = array_filter(array_map('trim', explode("\n", $validated['checklist_text'] ?? '')));
        unset($validated['checklist_text']);

        Feature::create($validated);

        return redirect()->route('admin.feature.index')->with('success', 'Feature created successfully.');
    }

    public function show(Feature $feature)
    {
        return view('admin.feature.show', compact('feature'));
    }

    public function edit(Feature $feature)
    {
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'checklist_text' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['checklist_items'] = array_filter(array_map('trim', explode("\n", $validated['checklist_text'] ?? '')));
        unset($validated['checklist_text']);

        $feature->update($validated);

        return redirect()->route('admin.feature.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('admin.feature.index')->with('success', 'Feature deleted successfully.');
    }
}
