@extends('admin.layouts.app')
@section('title', 'Blog Comments')
@section('header', 'Blog Comments')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Comments</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.blog-comment.index') }}" class="px-3 py-1 text-sm rounded {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">All</a>
        <a href="{{ route('admin.blog-comment.index', ['status' => 'pending']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-200 text-gray-700' }}">Pending</a>
        <a href="{{ route('admin.blog-comment.index', ['status' => 'approved']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'approved' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Approved</a>
        <a href="{{ route('admin.blog-comment.index', ['status' => 'spam']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'spam' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700' }}">Spam</a>
        <a href="{{ route('admin.blog-comment.index', ['status' => 'trash']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'trash' ? 'bg-gray-600 text-white' : 'bg-gray-200 text-gray-700' }}">Trash</a>
    </div>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Post</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Content</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($comments as $comment)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $comment->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $comment->post->title ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($comment->content, 50) }}</td>
                    <td class="px-6 py-4 text-sm">
                        @php
                            $statusColors = ['pending' => 'bg-yellow-100 text-yellow-800', 'approved' => 'bg-green-100 text-green-800', 'spam' => 'bg-red-100 text-red-800', 'trash' => 'bg-gray-100 text-gray-800'];
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$comment->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($comment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $comment->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 text-sm space-x-1">
                        <a href="{{ route('admin.blog-comment.show', $comment) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        @if($comment->status !== 'approved')
                            <form action="{{ route('admin.blog-comment.approve', $comment) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-900">Approve</button>
                            </form>
                        @endif
                        @if($comment->status !== 'spam')
                            <form action="{{ route('admin.blog-comment.spam', $comment) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-orange-600 hover:text-orange-900">Spam</button>
                            </form>
                        @endif
                        @if($comment->status !== 'trash')
                            <form action="{{ route('admin.blog-comment.trash', $comment) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-900">Trash</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.blog-comment.destroy', $comment) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-800 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No comments found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $comments->links() }}</div>
@endsection
