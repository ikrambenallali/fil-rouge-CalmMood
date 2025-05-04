<?php

use App\Http\Controllers\AdviceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\PositivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\StressTestController;
use App\Http\Controllers\TypeStressController;
use App\Http\Controllers\UserAdviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExerciseProgressController;
use App\Models\StressResult;
use Illuminate\Support\Facades\Route;

// wanita n screen page
Route::get('/', function () {
    return view('welcome');
});


// manaya n authentification
Route::middleware('guest')->group(function () {  
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForme');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForme');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware("auth")->name('logout');

Route::get('/home', function () {
    return view('home.index');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/contact', function () {
    return view('about.contactUs');
});

// admin 
Route::middleware(['auth', 'role:admin'])->group(function () {

    // user management
    Route::get('/dashboard', [UserController::class, 'index'])->middleware("auth")->name('allUsers');
    Route::delete('/dashboard/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::post('/dashboard/{id}', [UserController::class, 'activate'])->name('activerUser');
    Route::post('/dashboards/{id}', [UserController::class, 'desactivate'])->name('desactiverUser');

    // advices
    Route::post('/advice', [AdviceController::class, 'store'])->name('createAdvice');
    Route::get('/advice', [AdviceController::class, 'index'])->name('advice');
    Route::put('/advice/{id}', [AdviceController::class, 'update'])->name('advice.update');
    Route::delete('/advice/{id}', [AdviceController::class, 'destroy'])->name('advice.destroy');
   
    // categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categoryEx', [CategoryController::class, 'showcatEx'])->name('categoryEx');
    Route::get('/admin/exercices/categorie/{id}', [ExerciceController::class, 'parCategorie'])->name('exercices.parCategorie');

    // type stress
    Route::resource('type_stress', TypeStressController::class);

    // exercices
    Route::resource('exercices', ExerciceController::class);

    // statistics
    Route::get('/statistique', [statistiqueController::class, 'index'])->name('statistique');
});
// user 

Route::middleware(['auth', 'role:user'])->group(function () {

    // resultat n test  
    Route::post('/stressResult', [StressTestController::class, 'store'])->name('stressResult');
    Route::get('/stress-results/{id}', [StressTestController::class, 'show'])->name('stressResult.show');

    // exercices
    Route::get('/categoryExUser', [CategoryController::class, 'showcatExUser'])->name('categoryExUser');
    Route::get('/parCategorieUser/{id}', [ExerciceController::class, 'parCategorieUser'])->name('parCategorieUser');
    Route::get('/showExDetails/{id}', [ExerciceController::class, 'showExForUser'])->name('showExDetails');

    // advices
    Route::get('/allAdvice', [AdviceController::class, 'afficher'])->name('allAdvice');
    Route::get('/tipDetails/{id}', [AdviceController::class, 'show'])->name('tipDetails');

    // profil 
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'progress'])->name('profile');
    Route::get('/ExerciceProgress', [ProfileController::class, 'ExerciceProgress'])->name('ExerciceProgress');
    Route::get('/AdviceProgress', [ProfileController::class, 'AdviceProgress'])->name('AdviceProgress');

    // type de stress iyatmandan tamazwat wani login 
    Route::get('/type', [TypeStressController::class, 'typeStress'])->name('type');

    // wanita it2afichayi test i l user 
    Route::get('/stressResult', function () {
        return view('utilisateurs.test');
    })->name('stress.test');

    // wa it2aficha dashboard ithi ditmanda man type n stress iras 
    Route::get('/dashboardUser', function () {
        $stressResult = StressResult::where('user_id', auth()->id())->first();
        if ($stressResult && $stressResult->typeStress) { 
            $type = $stressResult->typeStress;
        } else {
            $type = null; 
        }
        return view('utilisateurs.dashboardUser', compact('type'));
    })->name('dashboardUser');

    // tha positivity
    Route::post('/positivity', [PositivityController::class, 'store'])->name('positivity');

    // exercice progress
    Route::post('/complete', [UserExerciseProgressController::class, 'complete'])->name('exercises.complete');
    
    // advice progress
    Route::post('/completeLectureConseils', [UserAdviceController::class, 'completeLectureConseils'])->name('advices.complete');
});
