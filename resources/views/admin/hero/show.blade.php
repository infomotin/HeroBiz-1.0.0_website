@extends('admin.layouts.app')
@section('title', 'View Hero')
@section('header', 'View Hero')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $hero->title }}</h3>
                <p class="text-sm text-gray-500">{{ $hero->subtitle }}</p>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $hero->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $hero->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $hero->description ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Button Text</p>
                <p class="font-medium text-gray-900">{{ $hero->btn_text ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Link</p>
                <p class="font-medium text-gray-900">{{ $hero->btn_link ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Video URL</p>
                <p class="font-medium text-gray-900">{{ $hero->video_url ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Video Button Text</p>
                <p class="font-medium text-gray-900">{{ $hero->video_btn_text ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $hero->created_at->format('Y-m-d H:i') }}</p>
            </div>
            <div>
                <p class="text-gray-500">Updated At</p>
                <p class="font-medium text-gray-900">{{ $hero->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.hero.edit', $hero) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.hero.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
