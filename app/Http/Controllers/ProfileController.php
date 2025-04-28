<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exercice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function progress()
    {
        $user = auth()->user();

        $completedExercisesCount = $user->exerciseProgress()
            ->whereNotNull('exercice_id')
            ->where('is_completed', true)
            ->count();
        // dd($completedExercisesCount);
        $completedAdvicesCount = $user->exerciseProgress()
            ->whereNotNull('advice_id')
            ->where('is_completed', true)
            ->count();
        // ###########################
        // $id = $user->stressResult->typeStress->id;
        // $category = Category::findOrFail($id);
        $mainType = Auth::user()->stressResult->main_type;
        $exercices = Exercice::whereHas('typeStress', function ($query) use ($mainType) {
            $query->where('name', $mainType);
        })->get();
        // dd($exercices);
        // ###########################

        $nombreExercicesDansMonTypeDeStress = $exercices->count();
        // dd($nombreExercicesDansMonTypeDeStress);
        $progress = ($completedExercisesCount / $nombreExercicesDansMonTypeDeStress) * 100;
        // dd($progress);
        return view('utilisateurs/profil', compact('user', 'completedExercisesCount', 'completedAdvicesCount','nombreExercicesDansMonTypeDeStress', 'progress'));
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
    public function ExerciceProgress()
    {
        $user = auth()->user();
        $exercices = $user->exerciseProgress()
            ->whereNotNull('exercice_id')
            ->where('is_completed', true)
            ->get();

        return view('utilisateurs/profil', compact('user', 'exercices'));
    }
}
