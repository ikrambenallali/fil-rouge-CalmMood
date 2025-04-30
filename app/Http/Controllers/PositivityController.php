<?php

namespace App\Http\Controllers;

use App\Models\Positivity;
use App\Models\User;
use App\Notifications\ExerciceNotification;
// use Illuminate\Container\Attributes\Auth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PositivityController extends Controller
{
    public function store(Request $request)
    {
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

        $user = User::first();
        $user->email;
        $positivities = Positivity::where('user_id', $user->id)->get();
        $user->notify(new ExerciceNotification($positivities));

        return redirect()->back();
    }
    public function PostivityNotification()
    {
        $user = User::first();
        $user->email;
        $positivities = Positivity::where('user_id', $user->id)->get();
        $user->notify(new ExerciceNotification($positivities));
    }
    
}
