@extends('admin.layouts.app')
@section('title', 'Service Details')
@section('header', 'Service Details')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Service Details</h2>
    <a href="{{ route('admin.service-detail.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Detail</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Icon</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($serviceDetails as $detail)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $detail->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $detail->service->title ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $detail->icon }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.service-detail.edit', $detail) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.service-detail.destroy', $detail) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No service details found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $serviceDetails->links() }}</div>
@endsection
