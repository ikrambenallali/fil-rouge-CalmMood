<?php

namespace App\Http\Controllers;

use App\Models\Positivity;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PositivityController extends Controller
{
    public function store(Request $request){
        // dd($request);

        $request->validate([
            'exercise_id' => 'required|exists:exercices,id',
            'positive_thing_1' => 'required|string|max:255',
            'positive_thing_2' => 'required|string|max:255',
            'positive_thing_3' => 'required|string|max:255',
        ]);

        Positivity::create([
            'user_id' => Auth::id(),
            'exercise_id' => $request->exercise_id,
            'positive_thing_1' => $request->positive_thing_1,
            'positive_thing_2' => $request->positive_thing_2,
            'positive_thing_3' => $request->positive_thing_3,
        ]);

        return redirect()->back();
    }
    // Schema::create('positivity_exercises', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
    //     $table->foreignId('exercise_id')->constrained('exercices')->onDelete('cascade'); 
    //     $table->string('positive_thing_1'); 
    //     $table->string('positive_thing_2');
    //     $table->string('positive_thing_3'); 
    //     $table->timestamps();
    // });
}
