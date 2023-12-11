<?php

namespace App\Services\AuthenticationManager;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Attempt to log in a user based on username and password.
     *
     * @param string $username
     * @param string $password
     *
     * @return \App\Models\User|null
     * @throws \Exception
     */
    public static function login(string $username, string $password): ?User
    {
        $user = User::where('username', $username)->first();

        if ($user && password_verify($password, $user->password)) {
            Auth::login($user);
            return $user;
        }

        throw new \Exception('Invalid username or password');
    }
}
