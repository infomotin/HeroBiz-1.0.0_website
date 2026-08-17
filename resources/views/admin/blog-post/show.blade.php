@extends('admin.layouts.app')
@section('title', 'View Blog Post')
@section('header', 'View Blog Post')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h3>
                <p class="text-sm text-gray-500">Slug: {{ $post->slug }}</p>
            </div>
            <div class="flex space-x-2">
                @if($post->published_at)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Author</p>
                <p class="font-medium text-gray-900">{{ $post->author->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Category</p>
                <p class="font-medium text-gray-900">{{ $post->category->name ?? 'N/A' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Excerpt</p>
                <p class="font-medium text-gray-900">{{ $post->excerpt ?? 'N/A' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Content</p>
                <div class="font-medium text-gray-900 whitespace-pre-wrap">{{ $post->content }}</div>
            </div>
            <div>
                <p class="text-gray-500">Featured Image</p>
                @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Tags</p>
                <div class="flex flex-wrap gap-1 mt-1">
                    @forelse($post->tags as $tag)
                        <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">{{ $tag->name }}</span>
                    @empty
                        <p class="font-medium text-gray-900">N/A</p>
                    @endforelse
                </div>
            </div>
            <div>
                <p class="text-gray-500">Views</p>
                <p class="font-medium text-gray-900">{{ $post->views ?? 0 }}</p>
            </div>
            <div>
                <p class="text-gray-500">Published At</p>
                <p class="font-medium text-gray-900">{{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $post->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.blog-post.edit', $post) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.blog-post.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
