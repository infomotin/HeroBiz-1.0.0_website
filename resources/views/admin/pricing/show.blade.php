@extends('admin.layouts.app')
@section('title', 'View Pricing')
@section('header', 'View Pricing')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $pricing->name }}</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $pricing->price }}</p>
                <p class="text-sm text-gray-500">per {{ $pricing->period }}</p>
            </div>
            <div class="flex space-x-2">
                @if($pricing->is_featured)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                @endif
                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $pricing->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $pricing->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="text-sm">
            <div>
                <p class="text-gray-500">Features</p>
                <ul class="mt-1 list-disc list-inside text-gray-900">
                    @forelse((array) $pricing->features as $feature)
                        <li>{{ $feature }}</li>
                    @empty
                        <li>N/A</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-500">Button Text</p>
                <p class="font-medium text-gray-900">{{ $pricing->btn_text ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Link</p>
                <p class="font-medium text-gray-900">{{ $pricing->btn_link ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Sort Order</p>
                <p class="font-medium text-gray-900">{{ $pricing->sort_order }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $pricing->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.pricing.edit', $pricing) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.pricing.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
