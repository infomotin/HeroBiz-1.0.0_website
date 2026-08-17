@extends('admin.layouts.app')
@section('title', 'View Page')
@section('header', 'View Page')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $page->title }}</h3>
                <p class="text-sm text-gray-500">Slug: {{ $page->slug }}</p>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $page->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $page->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Meta Title</p>
                <p class="font-medium text-gray-900">{{ $page->meta_title ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Meta Description</p>
                <p class="font-medium text-gray-900">{{ $page->meta_description ?? 'N/A' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Content</p>
                <div class="font-medium text-gray-900 whitespace-pre-wrap">{{ $page->content }}</div>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $page->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.page.edit', $page) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.page.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
