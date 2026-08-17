<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $messages = $query->latest()->paginate(15);
        return view('admin.contact-message.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        if ($contactMessage->status === 'unread') {
            $contactMessage->update(['status' => 'read']);
        }

        return view('admin.contact-message.show', compact('contactMessage'));
    }

    public function archive(ContactMessage $contactMessage)
    {
        $contactMessage->update(['status' => 'archived']);
        return redirect()->route('admin.contact-message.index')->with('success', 'Message archived.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-message.index')->with('success', 'Message deleted permanently.');
    }
}
