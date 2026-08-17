@extends('admin.layouts.app')
@section('title', 'View Service')
@section('header', 'View Service')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $service->title }}</h3>
            </div>
            <div class="flex space-x-2">
                @if($service->is_featured)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                @endif
                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Icon</p>
                <p class="font-medium text-gray-900">{{ $service->icon ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $service->description ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Link</p>
                <p class="font-medium text-gray-900">{{ $service->link ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Sort Order</p>
                <p class="font-medium text-gray-900">{{ $service->sort_order }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $service->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.service.edit', $service) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.service.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
