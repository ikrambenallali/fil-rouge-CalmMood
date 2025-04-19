<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'user'); 
    
        if ($request->filled('search')) {
            $search = $request->search;
    
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        $users = $query->paginate(5)->appends(['search' => $request->search]);
    
        return view('admin.dashboard', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('allUsers')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('allUsers')->with('error', 'User not found.');
        }
    }
    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'activer'; 
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur activé avec succès.');
    }
    public function desactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'desactiver'; 
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur desactiver avec succès.');
    }
}
