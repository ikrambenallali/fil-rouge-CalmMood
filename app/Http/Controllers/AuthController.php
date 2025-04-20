<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
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
        $user->notify(new UserNotification());
if($role == 'admin'){
    return redirect(route('dashboard'));

    }else{
        return redirect(route('typeStress'));
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

$role = $user->role;
        if($role == 'admin'){
            return redirect(route('allUsers'));
        
            }else{
                return redirect(route('typeStress'));
            }
                   }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
    // <form action="/logout" method="POST">
    // @csrf <!-- Token CSRF pour la sécurité -->
    // <button type="submit" class="bg-[#DD6ECA] text-[#FBF4FA] w-[100px] h-[40px] m-8 font-bold rounded-md">
    // Logout
    // </button>
    // </form>
    // public function showDashboard()
    // {
    //     $user = auth()->user(); 

    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard'); 
    //     }

    //     // $users = User::all(); 
    //     // return view('admin.dashboard', compact('users'));
    // }

}
