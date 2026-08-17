@extends('admin.layouts.app')
@section('title', 'View About Section')
@section('header', 'View About Section')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $aboutSection->title }}</h3>
                <p class="text-sm text-gray-500">{{ $aboutSection->subtitle }}</p>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $aboutSection->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $aboutSection->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Heading</p>
                <p class="font-medium text-gray-900">{{ $aboutSection->heading ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($aboutSection->image)
                    <img src="{{ asset('storage/' . $aboutSection->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $aboutSection->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.about-section.edit', $aboutSection) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.about-section.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
