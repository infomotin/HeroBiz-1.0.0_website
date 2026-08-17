<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogAuthor;
use Illuminate\Http\Request;

class AdminBlogAuthorController extends Controller
{
    public function index()
    {
        $authors = BlogAuthor::latest()->paginate(10);
        return view('admin.blog-author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.blog-author.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        BlogAuthor::create($validated);

        return redirect()->route('admin.blog-author.index')->with('success', 'Blog author created successfully.');
    }

    public function show(BlogAuthor $blogAuthor)
    {
        $blogAuthor->load('posts');
        return view('admin.blog-author.show', compact('blogAuthor'));
    }

    public function edit(BlogAuthor $blogAuthor)
    {
        return view('admin.blog-author.edit', compact('blogAuthor'));
    }

    public function update(Request $request, BlogAuthor $blogAuthor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $blogAuthor->update($validated);

        return redirect()->route('admin.blog-author.index')->with('success', 'Blog author updated successfully.');
    }

    public function destroy(BlogAuthor $blogAuthor)
    {
        $blogAuthor->delete();
        return redirect()->route('admin.blog-author.index')->with('success', 'Blog author deleted successfully.');
    }
}
