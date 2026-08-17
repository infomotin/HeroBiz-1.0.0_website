@extends('admin.layouts.app')
@section('title', 'Contact Messages')
@section('header', 'Contact Messages')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">All Contact Messages</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.contact-message.index') }}" class="px-3 py-1 text-sm rounded {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">All</a>
        <a href="{{ route('admin.contact-message.index', ['status' => 'unread']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'unread' ? 'bg-yellow-500 text-white' : 'bg-gray-200 text-gray-700' }}">Unread</a>
        <a href="{{ route('admin.contact-message.index', ['status' => 'read']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'read' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' }}">Read</a>
        <a href="{{ route('admin.contact-message.index', ['status' => 'archived']) }}" class="px-3 py-1 text-sm rounded {{ request('status') == 'archived' ? 'bg-gray-600 text-white' : 'bg-gray-200 text-gray-700' }}">Archived</a>
    </div>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($messages as $message)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $message->name }}<br><span class="text-gray-500">{{ $message->email }}</span></td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $message->subject }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($message->message, 50) }}</td>
                    <td class="px-6 py-4 text-sm">
                        @php
                            $statusColors = ['unread' => 'bg-yellow-100 text-yellow-800', 'read' => 'bg-green-100 text-green-800', 'archived' => 'bg-gray-100 text-gray-800'];
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$message->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($message->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $message->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 text-sm space-x-1">
                        <a href="{{ route('admin.contact-message.show', $message) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        @if($message->status !== 'archived')
                            <form action="{{ route('admin.contact-message.archive', $message) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-900">Archive</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.contact-message.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No messages found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $messages->links() }}</div>
@endsection
