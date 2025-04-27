<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $advices = Advice::all();
        return view('admin.advice', compact('advices'));
    }
    public function afficher()
    {
        $user = auth()->user();
        $advices = Advice::all();
        return view('utilisateurs/tips/allTips', compact('advices'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => ['required'],
        ]);


        $imagepath = $request->file('image') ? $request->file('image')->store('advices', 'public') : null;

        $advice = Advice::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagepath,

        ]);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advice = Advice::findOrFail($id);
        return view('utilisateurs/tips/tipDetails', compact('advice'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => ['nullable', 'image'], // image facultative lors de l'update
        ]);

        $advice = Advice::findOrFail($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image s'il y en a une
            if ($advice->image) {
                Storage::disk('public')->delete($advice->image);
            }
            $imagepath = $request->file('image')->store('advices', 'public');
            $advice->image = $imagepath;
        }

        $advice->title = $request->title;
        $advice->content = $request->content;
        $advice->save();

        return redirect()->back()->with('success', 'Conseil mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advice = Advice::findOrFail($id);
        if ($advice->image) {
            Storage::disk('public')->delete($advice->image);
        }
        $advice->delete();

        return redirect()->back()->with('success', 'Conseil supprimé avec succès');
    }
}
