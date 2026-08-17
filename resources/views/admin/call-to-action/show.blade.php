@extends('admin.layouts.app')
@section('title', 'View Call to Action')
@section('header', 'View Call to Action')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $callToAction->heading }}</h3>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $callToAction->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $callToAction->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div class="col-span-2">
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $callToAction->description ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Text</p>
                <p class="font-medium text-gray-900">{{ $callToAction->btn_text ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Link</p>
                <p class="font-medium text-gray-900">{{ $callToAction->btn_link ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($callToAction->image)
                    <img src="{{ asset('storage/' . $callToAction->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $callToAction->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.call-to-action.edit', $callToAction) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.call-to-action.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
