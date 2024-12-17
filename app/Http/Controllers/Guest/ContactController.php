<?php

namespace App\Http\Controllers\Guest;

use App\Models\Message;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\ContactMessageNotification;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        $key = 'contact-form:' . $request->ip();
        $maxAttempts = 3;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            return response()->json(['error' => 'Too many requests. Please try again later.'], 429);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20|regex:/^[0-9\-\+\s\(\)]+$/',
            'message' => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            $message = Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            Log::info("Message created: ", $message->toArray());

            Cache::put('last_message', $message, 60);

            $adminEmails = ['dj.deguzman@btsmcph.com', 'recruiter@example.com'];
            Mail::to($adminEmails)->send(new ContactMessageNotification($message));

            Log::info("Email sent successfully to: " . implode(', ', $adminEmails));

            DB::commit();

            RateLimiter::hit($key);

            return response()->json(['success' => 'Your message has been sent successfully.']);
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error("Error occurred: " . $e->getMessage());

            return response()->json(['error' => 'There was an issue sending your message. Please try again later.'], 500);
        }
    }
}
