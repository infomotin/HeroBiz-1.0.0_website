@extends('admin.layouts.app')
@section('title', 'View Service Detail')
@section('header', 'View Service Detail')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $serviceDetail->title }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Service</p>
                <p class="font-medium text-gray-900">{{ $serviceDetail->service->title ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $serviceDetail->description ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Icon</p>
                <p class="font-medium text-gray-900">{{ $serviceDetail->icon ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Image</p>
                @if($serviceDetail->image)
                    <img src="{{ asset('storage/' . $serviceDetail->image) }}" alt="" class="mt-1 h-20 rounded object-cover">
                @else
                    <p class="font-medium text-gray-900">N/A</p>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.service-detail.edit', $serviceDetail) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.service-detail.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
