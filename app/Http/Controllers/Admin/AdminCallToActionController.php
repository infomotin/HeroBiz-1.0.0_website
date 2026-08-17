<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallToAction;
use Illuminate\Http\Request;

class AdminCallToActionController extends Controller
{
    public function index()
    {
        $callToActions = CallToAction::latest()->paginate(10);
        return view('admin.call-to-action.index', compact('callToActions'));
    }

    public function create()
    {
        return view('admin.call-to-action.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        CallToAction::create($validated);

        return redirect()->route('admin.call-to-action.index')->with('success', 'Call to action created successfully.');
    }

    public function show(CallToAction $callToAction)
    {
        return view('admin.call-to-action.show', compact('callToAction'));
    }

    public function edit(CallToAction $callToAction)
    {
        return view('admin.call-to-action.edit', compact('callToAction'));
    }

    public function update(Request $request, CallToAction $callToAction)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $callToAction->update($validated);

        return redirect()->route('admin.call-to-action.index')->with('success', 'Call to action updated successfully.');
    }

    public function destroy(CallToAction $callToAction)
    {
        $callToAction->delete();
        return redirect()->route('admin.call-to-action.index')->with('success', 'Call to action deleted successfully.');
    }
}
