@extends('admin.layouts.app')
@section('title', 'Blog Authors')
@section('header', 'Blog Authors')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Blog Authors</h2>
    <a href="{{ route('admin.blog-author.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Author</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posts</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($authors as $author)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $author->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $author->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $author->posts_count ?? $author->posts->count() }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.blog-author.edit', $author) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.blog-author.destroy', $author) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No authors found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $authors->links() }}</div>
@endsection
