<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user()->load('stressResult.typeStress');

        return view('utilisateurs/profil', [
            'user' => $user,
        ]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();

        // Valider les données entrées
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mettre à jour le nom et l'email
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Mettre à jour le mot de passe uniquement si l'utilisateur a saisi un nouveau
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }

}
