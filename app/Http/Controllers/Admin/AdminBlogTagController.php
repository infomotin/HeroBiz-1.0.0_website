<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogTagController extends Controller
{
    public function index()
    {
        $tags = BlogTag::latest()->paginate(10);
        return view('admin.blog-tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog-tag.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_tags,slug',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogTag::create($validated);

        return redirect()->route('admin.blog-tag.index')->with('success', 'Blog tag created successfully.');
    }

    public function show(BlogTag $blogTag)
    {
        $blogTag->load('posts');
        return view('admin.blog-tag.show', compact('blogTag'));
    }

    public function edit(BlogTag $blogTag)
    {
        return view('admin.blog-tag.edit', compact('blogTag'));
    }

    public function update(Request $request, BlogTag $blogTag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_tags,slug,' . $blogTag->id,
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $blogTag->update($validated);

        return redirect()->route('admin.blog-tag.index')->with('success', 'Blog tag updated successfully.');
    }

    public function destroy(BlogTag $blogTag)
    {
        $blogTag->posts()->detach();
        $blogTag->delete();
        return redirect()->route('admin.blog-tag.index')->with('success', 'Blog tag deleted successfully.');
    }
}
