<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(10);
        return view('admin.blog-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'description' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogCategory::create($validated);

        return redirect()->route('admin.blog-category.index')->with('success', 'Blog category created successfully.');
    }

    public function show(BlogCategory $blogCategory)
    {
        $blogCategory->load('posts');
        return view('admin.blog-category.show', compact('blogCategory'));
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-category.index')->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog-category.index')->with('success', 'Blog category deleted successfully.');
    }
}
