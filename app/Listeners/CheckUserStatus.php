<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;

class CheckUserStatus
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Check if the logged-in user's status is not 'active'
        if ($event->user->status !== 'active') {
            Auth::logout();

            // Flash an error message to the session
            session()->flash('error', 'Your account is inactive. Please contact support.');

            // Redirect to login page (handled by middleware or controller after logout)
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            abort(redirect()->route('login'));
        }
    }
}
