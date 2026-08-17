@extends('admin.layouts.app')
@section('title', 'View Portfolio')
@section('header', 'View Portfolio')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $portfolio->title }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Category</p>
                <p class="font-medium text-gray-900">{{ $portfolio->category->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $portfolio->description ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $portfolio->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.portfolio.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
