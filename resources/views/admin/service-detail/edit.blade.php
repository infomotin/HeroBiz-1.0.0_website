@extends('admin.layouts.app')
@section('title', 'Edit Service Detail')
@section('header', 'Edit Service Detail')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.service-detail.update', $serviceDetail) }}" method="POST">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Service *</label>
                <select name="service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                    <option value="">Select Service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id', $serviceDetail->service_id) == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                    @endforeach
                </select>
                @error('service_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" value="{{ old('title', $serviceDetail->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $serviceDetail->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon', $serviceDetail->icon) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" name="image" value="{{ old('image', $serviceDetail->image) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>
            </div>
        </div>
        <div class="mt-4 space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.service-detail.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
