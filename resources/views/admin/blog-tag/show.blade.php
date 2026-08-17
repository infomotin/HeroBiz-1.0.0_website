@extends('admin.layouts.app')
@section('title', 'View Blog Tag')
@section('header', 'View Blog Tag')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $blogTag->name }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Slug</p>
                <p class="font-medium text-gray-900">{{ $blogTag->slug }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $blogTag->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.blog-tag.edit', $blogTag) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.blog-tag.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
