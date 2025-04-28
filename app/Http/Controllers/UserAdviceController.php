<?php

namespace App\Http\Controllers;

use App\Models\UserAdvice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdviceController extends Controller
{
    public function completeLectureConseils(Request $request)
    {
        $adviceIds = $request->input('advices', []);
    
        foreach ($adviceIds as $adviceId) {
            UserAdvice::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'advice_id' => $adviceId,
                ],
                [
                    'is_completed' => true,
                ]
            );
        }
    
        return redirect()->back()->with('success', 'advices complétés enregistrés avec succès !');
    }
}
