<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exercice;
use App\Models\StressResult;
use App\Models\Type_stress;
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
        $user = User::findorFail($id);
        // return $user->stressResult->main_type;
        $categories = Category::all();
        $exercices = Exercice::with('category', 'typeStress')->get();
        return view('admin/exercices', compact('exercices', 'categories', 'user'));
    }
    public function parCategorie($id)
    {
        $category = Category::findOrFail($id);
        $exercices = $category->exercices;

        return view('admin/allex', compact('category', 'exercices'));
    }
    public function parCategorieUser($id)

    {

        $category = Category::findOrFail($id);
        $mainType = Auth::user()->stressResult->main_type;
        $exercices = $category->exercices()->whereHas('typeStress', function ($query) use ($mainType) {
            $query->where('name', $mainType);
        })->get();

        return view('utilisateurs/exercices/exercices', compact('category', 'exercices'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $typesStress = Type_stress::all();
        return view('admin/exForm', compact('categories', 'typesStress'));
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
            'typeStressId' => 'required|exists:type_Stress,id',
            'video_url' => 'nullable|url|max:255',
            'audio_url' => 'nullable|url|max:255',
            'respiration_data' => 'nullable|json',

        ]);
        // dd('typeStressId');
        Exercice::create($validated);

        return redirect()->route('exercices.create')->with('success', 'Exercice ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exercices = Exercice::findOrFail($id);
        return view('admin/respiration/exrespiration', compact('exercices'));
    }
    public function showExForUser(string $id)
    {
        $exercices = Exercice::findOrFail($id);
        return view('utilisateurs/exercices/exerciceDetails', compact('exercices'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exercice = Exercice::findOrFail($id);
        $categories = Category::all();
        return view('admin/updateEx', compact('exercice', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'typeStressId' => 'required|exists:type_Stress,id',
            'video_url' => 'nullable|url|max:255',
            'audio_url' => 'nullable|url|max:255',
            'respiration_data' => 'nullable|json',
        ]);

        $exercice = Exercice::findOrFail($id);

        $exercice->update($validated);

        return redirect()->route('exercices.show', $exercice->id)
            ->with('success', 'Exercice mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exercice = Exercice::findOrFail($id);
        $exercice->delete();

        return redirect()->back()->with('success', 'exerice supprimé avec succès');
    }
}
