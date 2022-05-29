<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function register($user)
    {
        $new_user = User::create($user);
        Auth::login($new_user);
        return $new_user;
    }

    public function login($user)
    {
       return Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function updateUser($userId,$user)
    {
        User::whereId($userId)->update($user);
        return User::findOrFail($userId);
    }
}
