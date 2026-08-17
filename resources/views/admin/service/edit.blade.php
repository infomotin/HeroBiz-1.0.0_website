@extends('admin.layouts.app')
@section('title', 'Edit Service')
@section('header', 'Edit Service')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.service.update', $service) }}" method="POST">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Icon</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $service->description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Image URL</label>
                <input type="text" name="image" value="{{ old('image', $service->image) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Link</label>
                <input type="text" name="link" value="{{ old('link', $service->link) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-900">Featured</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-900">Active</label>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
            </div>
        </div>
        <div class="mt-4 space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.service.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
