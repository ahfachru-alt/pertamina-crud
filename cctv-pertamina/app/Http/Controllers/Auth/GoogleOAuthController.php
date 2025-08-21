<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class GoogleOAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?: ($googleUser->getNickname() ?: 'User'),
                'password' => Hash::make(Str::random(24)),
                'email_verified_at' => now(),
            ]
        );

        if (!$user->hasRole('User')) {
            Role::findOrCreate('User');
            $user->assignRole('User');
        }

        Auth::login($user, remember: true);

        return redirect()->intended(route('dashboard'));
    }
}

