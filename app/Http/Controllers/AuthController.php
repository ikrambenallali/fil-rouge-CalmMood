<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $role = $isFirstUser ? 'admin' : 'user';

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $role
        ]);
        $token = $user->createToken($request->name);
        Auth::login($user);

        $user->notify(new UserNotification());
        if ($role == 'admin') {
            return redirect(route('dashboard'));
        } else {
            return redirect(route('type'));
        }
    }
    public function showLoginForm()
    {
        return view('authentification.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ]
            ];
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }

        $token = $user->createToken($user->name);
        Auth::login($user);

        $role = $user->role;
        if ($role == 'admin') {
            return redirect(route('allUsers'));
        } else {
            return redirect(route('type'));
        }
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginForme'));
    }
}
