<?php

namespace App\Http\Controllers;

use App\Models\Type_stress;
use App\Models\User;
use Illuminate\Http\Request;

class TypeStressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // tha n admin 
    public function index()
    {
        // $user = auth()->user();
        $types = Type_stress::all();
        return view('typeStress', compact('types'));
    }
    // tha ithas ditmandan i user tamazwat 
    public function typeStress()
    {
        $types = Type_stress::all();
        return view('utilisateurs/type', compact('types'));
    }

    // public function test(string $id){
    //     $user = auth()->user();

    //     $type = User::findOrFail($user->id)->stressResult->main_type;
    //     return view('utilisateurs/dashboardUser', compact('type'));
    // }
    // public function test()
    // {
    //     $user = auth()->user();
    //     $stressResult = $user->stressResult;  
    //     $type = $stressResult->type; 
    //     return view('utilisateurs.dashboardUser', compact('type'));
    // }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        Type_stress::create([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $type = Type_stress::findOrFail($id);
    //     return view('utilisateurs/dashboardUser', compact('type'));
    // }

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
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        $type = Type_stress::findOrFail($id);

        $type->name = $request->name;
        $type->content = $request->content;

        $type->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type_stress::findOrFail($id);
        $type->delete();
        return redirect()->back();
    }
}
