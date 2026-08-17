@extends('admin.layouts.app')
@section('title', 'Edit Onfocus Section')
@section('header', 'Edit Onfocus Section')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.onfocus.update', $onfocusSection) }}" method="POST">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Heading *</label>
                <input type="text" name="heading" value="{{ old('heading', $onfocusSection->heading) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                @error('heading') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $onfocusSection->description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Checklist Items (one per line)</label>
                <textarea name="checklist_text" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ is_array($onfocusSection->checklist_items) ? implode("\n", $onfocusSection->checklist_items) : '' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Video URL</label>
                <input type="text" name="video_url" value="{{ old('video_url', $onfocusSection->video_url) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Button Text</label>
                    <input type="text" name="btn_text" value="{{ old('btn_text', $onfocusSection->btn_text) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Button Link</label>
                    <input type="text" name="btn_link" value="{{ old('btn_link', $onfocusSection->btn_link) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $onfocusSection->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label class="ml-2 block text-sm text-gray-900">Active</label>
            </div>
        </div>
        <div class="mt-4 space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.onfocus.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
