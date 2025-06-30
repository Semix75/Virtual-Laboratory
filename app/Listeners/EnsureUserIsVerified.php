<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsVerified
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        if ($user->role === 'student' && !$user->is_verified) {
            Auth::logout();
            session()->flash('error', 'Your account is not verified yet by admin.');
            redirect('/login')->send();
        }
    }
}