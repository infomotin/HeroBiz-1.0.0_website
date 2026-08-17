@extends('admin.layouts.app')
@section('title', 'View Comment')
@section('header', 'View Comment')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $comment->name }}</h3>
                <p class="text-sm text-gray-500">{{ $comment->email }}</p>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full
                @if($comment->status === 'approved') bg-green-100 text-green-800
                @elseif($comment->status === 'spam') bg-red-100 text-red-800
                @elseif($comment->status === 'trash') bg-gray-100 text-gray-800
                @else bg-yellow-100 text-yellow-800 @endif">
                {{ ucfirst($comment->status) }}
            </span>
        </div>
        <div>
            <p class="text-sm text-gray-500">Post: <span class="font-medium text-gray-900">{{ $comment->post->title ?? 'N/A' }}</span></p>
            <p class="text-sm text-gray-500">Date: <span class="font-medium text-gray-900">{{ $comment->created_at->format('Y-m-d H:i') }}</span></p>
        </div>
        <div class="border-t pt-4">
            <p class="text-sm text-gray-500 mb-1">Content:</p>
            <div class="text-gray-900 whitespace-pre-wrap">{{ $comment->content }}</div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        @if($comment->status !== 'approved')
            <form action="{{ route('admin.blog-comment.approve', $comment) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Approve</button>
            </form>
        @endif
        @if($comment->status !== 'spam')
            <form action="{{ route('admin.blog-comment.spam', $comment) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Mark as Spam</button>
            </form>
        @endif
        <a href="{{ route('admin.blog-comment.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
