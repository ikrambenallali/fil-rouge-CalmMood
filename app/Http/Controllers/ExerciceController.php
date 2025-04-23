<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exercice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());
        $user = User::findorFail(2);
        // return $user->stressResult->main_type;
        $categories = Category::all();
        $exercices = Exercice::with('category')->get();
        return view('admin/exercices', compact('exercices', 'categories', 'user'));
    }
    public function parCategorie($id)
{
    $category = Category::findOrFail($id);
    $exercices = $category->exercices; // Assure-toi que la relation est définie

    return view('admin/allex', compact('category', 'exercices'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin/exForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'duration' => 'required|integer|min:1',
            'video_url' => 'nullable|url|max:255',
            'audio_url' => 'nullable|url|max:255',
            'animation_script' => 'nullable|string',
        ]);

        Exercice::create($validated);

        return redirect()->route('exercices.create')->with('success', 'Exercice ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        $exercices = Exercice::findOrFail($id);
        return view('admin/respiration/exrespiration', compact('exercices'));
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
        //
    }
}
