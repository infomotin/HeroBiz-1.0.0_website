@extends('admin.layouts.app')
@section('title', 'View Message')
@section('header', 'View Contact Message')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $contactMessage->subject }}</h3>
                <p class="text-sm text-gray-500">From: {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
                <p class="text-sm text-gray-500">Date: {{ $contactMessage->created_at->format('Y-m-d H:i') }}</p>
            </div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full
                @if($contactMessage->status === 'read') bg-green-100 text-green-800
                @elseif($contactMessage->status === 'archived') bg-gray-100 text-gray-800
                @else bg-yellow-100 text-yellow-800 @endif">
                {{ ucfirst($contactMessage->status) }}
            </span>
        </div>
        <div class="border-t pt-4">
            <p class="text-sm text-gray-500 mb-1">Message:</p>
            <div class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</div>
        </div>
    </div>
    <div class="mt-4 space-x-2">
        <a href="{{ route('admin.contact-message.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Back</a>
    </div>
</div>
@endsection
