@extends('admin.layouts.app')
@section('title', 'View Feature')
@section('header', 'View Feature')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $feature->title }}</h3>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $feature->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $feature->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Icon</p>
                <p class="font-medium text-gray-900">{{ $feature->icon ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Color</p>
                <div class="flex items-center mt-1">
                    @if($feature->color)
                        <span class="inline-block w-6 h-6 rounded mr-2" style="background-color: {{ $feature->color }}"></span>
                    @endif
                    <p class="font-medium text-gray-900">{{ $feature->color ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $feature->description ?? 'N/A' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Content</p>
                <div class="font-medium text-gray-900 whitespace-pre-wrap">{{ $feature->content ?? 'N/A' }}</div>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Checklist Items</p>
                <ul class="mt-1 list-disc list-inside text-gray-900">
                    @forelse((array) $feature->checklist_items as $item)
                        <li>{{ $item }}</li>
                    @empty
                        <li>N/A</li>
                    @endforelse
                </ul>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($feature->image)
                    <img src="{{ asset('storage/' . $feature->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Sort Order</p>
                <p class="font-medium text-gray-900">{{ $feature->sort_order }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $feature->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.feature.edit', $feature) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.feature.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
