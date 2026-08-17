@extends('admin.layouts.app')
@section('title', 'View Onfocus Section')
@section('header', 'View Onfocus Section')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $onfocusSection->heading }}</h3>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $onfocusSection->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $onfocusSection->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div class="col-span-2">
                <p class="text-gray-500">Description</p>
                <p class="font-medium text-gray-900">{{ $onfocusSection->description ?? 'N/A' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-500">Checklist Items</p>
                <ul class="mt-1 list-disc list-inside text-gray-900">
                    @forelse((array) $onfocusSection->checklist_items as $item)
                        <li>{{ $item }}</li>
                    @empty
                        <li>N/A</li>
                    @endforelse
                </ul>
            </div>
            <div>
                <p class="text-gray-500">Video URL</p>
                <p class="font-medium text-gray-900">{{ $onfocusSection->video_url ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Text</p>
                <p class="font-medium text-gray-900">{{ $onfocusSection->btn_text ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Button Link</p>
                <p class="font-medium text-gray-900">{{ $onfocusSection->btn_link ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Created At</p>
                <p class="font-medium text-gray-900">{{ $onfocusSection->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.onfocus.edit', $onfocusSection) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
        <a href="{{ route('admin.onfocus.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
