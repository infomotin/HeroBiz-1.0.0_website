@extends('admin.layouts.app')
@section('title', 'Call to Actions')
@section('header', 'Call to Action Sections')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Call to Actions</h2>
    <a href="{{ route('admin.call-to-action.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add CTA</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heading</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Button Text</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Active</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($callToActions as $cta)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $cta->heading }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $cta->btn_text }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $cta->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $cta->is_active ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.call-to-action.edit', $cta) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.call-to-action.destroy', $cta) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No call to actions found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $callToActions->links() }}</div>
@endsection
