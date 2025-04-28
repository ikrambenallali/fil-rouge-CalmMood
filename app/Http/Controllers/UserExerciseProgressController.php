<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\UserExerciseProgress;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExerciseProgressController extends Controller
{
    public function complete(Request $request)
    {
        $exerciceIds = $request->input('exercices', []);
    
        foreach ($exerciceIds as $exerciceId) {
            UserExerciseProgress::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'exercice_id' => $exerciceId,
                ],
                [
                    'is_completed' => true,
                ]
            );
        }
    
        return redirect()->back()->with('success', 'Exercices complétés enregistrés avec succès !');
    }
    
}
