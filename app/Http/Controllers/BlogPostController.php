<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = BlogPost::with(['author', 'category'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(BlogPost $post)
    {
        // Increment view count
        $post->increment('views');

        // Load relationships
        $post->load(['author', 'category', 'tags']);

        // Get approved comments
        $comments = $post->comments()
            ->where('status', 'approved')
            ->with('user')
            ->latest()
            ->get();

        // Get related posts (same category, excluding current)
        $relatedPosts = BlogPost::with(['author', 'category'])
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'comments', 'relatedPosts'));
    }
}