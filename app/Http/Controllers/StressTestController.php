<?php

namespace App\Http\Controllers;

use App\Models\StressResult;
use Illuminate\Http\Request;

class StressTestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'acute' => 'required|integer',
            'chronic' => 'required|integer',
            'emotional' => 'required|integer',
            'physical' => 'required|integer',
            'main_type' => 'required|string',
        ]);
    
        // Ajouter l'ID de l'utilisateur connecté
        $validated['user_id'] = 2;  // 👈 Assure-toi que l'utilisateur est bien connecté
    
        $result = StressResult::create($validated);
    
        return response()->json(['id' => $result->id]);
    }
    


public function show($id)
{
    $result = StressResult::findOrFail($id);
    return view('utilisateurs.result', compact('result'));
}
    
}
