<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('authentification.signUp');
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $isFirstUser = User::count() == 0;
        // dd($isFirstUser);
        $role = $isFirstUser ? 'admin' : 'user';

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), 
            'role' => $role
                ]);
        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'role' => $role,
            'token' => $token->plainTextToken
        ];
    }
}
