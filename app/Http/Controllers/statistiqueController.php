<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use App\Models\Category;
use App\Models\Exercice;
use App\Models\StressResult;
use App\Models\User;
use Illuminate\Http\Request;

class statistiqueController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalAdvices = Advice::count();
        $stressResults = StressResult::all();
        $totalExercises = Exercice::count();
        return view('admin/statistiques', compact('totalUsers','totalCategories', 'totalAdvices', 'stressResults','totalExercises'));
    }
}
