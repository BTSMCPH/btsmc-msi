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
        // $messages = Message::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.contact.messages.index');
    }

    /**
     * Fetch messages dynimically for DataTable.
     */
    public function fetchMessages(Request $request)
    {
        $messagesQuery = Message::query();

        // Apply any global search
        if ($request->has('search') && $request->search['value']) {
            $messagesQuery->where('name', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('email', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('phone', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('message', 'like', '%' . $request->search['value'] . '%');
        }

        // Apply sorting
        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['data'];
            $orderDirection = $request->order[0]['dir'];
            $messagesQuery->orderBy($orderColumn, $orderDirection);
        } else {
            // Default sorting: Show the latest messages first
            $messagesQuery->orderBy('id', 'desc');
        }

        // Apply pagination
        $length = $request->get('length', 12);
        $start = $request->get('start', 0);
        $messages = $messagesQuery->skip($start)->take($length)->get();

        // Return the response in DataTables format
        return response()->json([
            'draw' => $request->get('draw'),
            'recordsTotal' => Message::count(),
            'recordsFiltered' => $messagesQuery->count(), // Use filtered count
            'data' => $messages->map(function ($message) {
                return [
                    'id' => $message->id,
                    'name' => $message->name,
                    'email' => $message->email,
                    'phone' => $message->phone,
                    'message' => $message->message,
                    'created_at' => $message->created_at->format('M d, Y h:i A'),
                    'actions' => view('admin.pages.contact.messages.partials.actions', compact('message'))->render()
                ];
            })
        ]);
    }

    /**
     * Display a listing of the soft-deleted messages (Trash).
     */
    public function trashed(): View
    {
        $messages = Message::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);

        return view('admin.pages.contact.messages.trashed', compact('messages'));
    }

    /**
     * Display a specific message in detail.
     */
    public function show(Message $message): View
    {
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
    public function restore($id): RedirectResponse
    {
        $message = Message::withTrashed()->findOrFail($id);

        $message->restore();

        return redirect()->route('messages.trashed')->with('success', 'Message restored successfully.');
    }


    /**
     * Permanently delete a message from the trash.
     */
    public function forceDelete($id): RedirectResponse
    {
        $message = Message::withTrashed()->findOrFail($id);

        $message->forceDelete();

        return redirect()->route('messages.trashed')->with('success', 'Message permanently deleted.');
    }
}
