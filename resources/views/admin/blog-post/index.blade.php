@extends('admin.layouts.app')
@section('title', 'Blog Posts')
@section('header', 'Blog Posts')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Blog Posts</h2>
    <a href="{{ route('admin.blog-post.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Post</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Published</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($posts as $post)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $post->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $post->category->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $post->author->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm">
                        @php
                            $statusColors = ['draft' => 'bg-yellow-100 text-yellow-800', 'published' => 'bg-green-100 text-green-800', 'archived' => 'bg-gray-100 text-gray-800'];
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$post->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($post->status ?? 'draft') }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $post->published_at?->format('Y-m-d') ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.blog-post.edit', $post) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.blog-post.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No blog posts found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $posts->links() }}</div>
@endsection
