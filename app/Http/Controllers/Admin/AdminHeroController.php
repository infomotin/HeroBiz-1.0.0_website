<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class AdminHeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::latest()->paginate(10);
        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'video_btn_text' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        Hero::create($validated);

        return redirect()->route('admin.hero.index')->with('success', 'Hero created successfully.');
    }

    public function show(Hero $hero)
    {
        return view('admin.hero.show', compact('hero'));
    }

    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'video_btn_text' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $hero->update($validated);

        return redirect()->route('admin.hero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Hero deleted successfully.');
    }
}
