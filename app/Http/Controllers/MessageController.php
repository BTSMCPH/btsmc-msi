<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index(): View
    {
        // Get all non-deleted messages, order by latest
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);

        // Pass messages to the admin view
        return view('admin.pages.contact.messages.index', compact('messages'));
    }

    /**
     * Display a listing of the soft-deleted messages (Trash).
     */
    public function trashed(): View
    {
        // Get all soft-deleted messages
        $messages = Message::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);

        // Pass messages to the trash view
        return view('admin.pages.contact.messages.trashed', compact('messages'));
    }

    /**
     * Display a specific message in detail.
     */
    public function show(Message $message): View
    {
        // Get the specific message, including soft-deleted ones
        $message = Message::withTrashed()->findOrFail($message->id);

        return view('admin.pages.contact.messages.show', compact('message'));
    }

    /**
     * Soft delete a specific message.
     */
    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message moved to trash successfully.');
    }

    /**
     * Restore a soft-deleted message.
     */
    public function restore(Message $message): RedirectResponse
    {
        \dd($message);

        $message->restore();

        return redirect()->route('messages.trashed')->with('success', 'Message restored successfully.');
    }

    /**
     * Permanently delete a message from the trash.
     */
    public function forceDelete(Message $message): RedirectResponse
    {
        $message->forceDelete();

        return redirect()->route('messages.trashed')->with('success', 'Message permanently deleted.');
    }
}
