<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class AdminBlogCommentController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogComment::with('post');

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $comments = $query->latest()->paginate(15);
        return view('admin.blog-comment.index', compact('comments'));
    }

    public function show(BlogComment $comment)
    {
        $comment->load('post', 'user');
        return view('admin.blog-comment.show', compact('comment'));
    }

    public function approve(BlogComment $comment)
    {
        $comment->update(['status' => 'approved']);
        return redirect()->route('admin.blog-comment.index')->with('success', 'Comment approved.');
    }

    public function spam(BlogComment $comment)
    {
        $comment->update(['status' => 'spam']);
        return redirect()->route('admin.blog-comment.index')->with('success', 'Comment marked as spam.');
    }

    public function trash(BlogComment $comment)
    {
        $comment->update(['status' => 'trash']);
        return redirect()->route('admin.blog-comment.index')->with('success', 'Comment moved to trash.');
    }

    public function destroy(BlogComment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.blog-comment.index')->with('success', 'Comment deleted permanently.');
    }
}
