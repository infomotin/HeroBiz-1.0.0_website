@extends('admin.layouts.app')
@section('title', 'Clients')
@section('header', 'Clients')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Clients</h2>
    <a href="{{ route('admin.client.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Client</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Website</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Active</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($clients as $client)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $client->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $client->website }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $client->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $client->is_active ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $client->sort_order }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.client.edit', $client) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.client.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No clients found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $clients->links() }}</div>
@endsection
