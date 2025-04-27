<?php

use App\Http\Controllers\AdviceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\PositivityController;
use App\Http\Controllers\StressTestController;
use App\Http\Controllers\TypeStressController;
use App\Http\Controllers\UserController;
use App\Models\StressResult;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForme');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForme');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', function () {
    return view('home.index');
});
Route::get('/about', function () {
    return view('about.index');
});
Route::get('/contact', function () {
    return view('about.contactUs');
});




Route::post('/contactStore', [ContactController::class, 'store'])->name('contact.store');
// dashboard routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->middleware("auth")->name('allUsers');
    Route::delete('/dashboard/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::post('/dashboard/{id}', [UserController::class, 'activate'])->name('activerUser');
    Route::post('/dashboards/{id}', [UserController::class, 'desactivate'])->name('desactiverUser');
    Route::post('/advice', [AdviceController::class, 'store'])->name('createAdvice');
    Route::get('/advice', [AdviceController::class, 'index'])->name('advice');
    Route::put('/advice/{id}', [AdviceController::class, 'update'])->name('advice.update');
    Route::delete('/advice/{id}', [AdviceController::class, 'destroy'])->name('advice.destroy');

    // wanita omba3d ikhasa atharar ra user rakho 9a testir waha sf ni 
    Route::post('/positivity', [PositivityController::class, 'store'])->name('positivity');

    // orath wa athaksar testir waha daga 


    Route::resource('categories', CategoryController::class);
    Route::resource('type_stress', TypeStressController::class);
    Route::resource('exercices', ExerciceController::class);

    Route::get('/respirationEquilibre', function () {
        return view('admin.respiration.RespirationEquilibre');
    })->name('respirationEquilibre');

    Route::get('/respiration478', function () {
        return view('admin.respiration.Respiration478');
    })->name('respiration478');
    Route::get('/categoryEx', [CategoryController::class, 'showcatEx'])->name('categoryEx');
    Route::get('/admin/exercices/categorie/{id}', [ExerciceController::class, 'parCategorie'])->name('exercices.parCategorie');
});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::post('/stressResult', [StressTestController::class, 'store'])->name('stressResult');
    Route::get('/stress-results/{id}', [StressTestController::class, 'show'])->name('stressResult.show');
    Route::get('/categoryExUser', [CategoryController::class, 'showcatExUser'])->name('categoryExUser');
    Route::get('/parCategorieUser/{id}', [ExerciceController::class, 'parCategorieUser'])->name('parCategorieUser');
    Route::get('/showExDetails/{id}', [ExerciceController::class, 'showExForUser'])->name('showExDetails');
    Route::get('/allAdvice', [AdviceController::class, 'afficher'])->name('allAdvice');
    Route::get('/tipDetails/{id}', [AdviceController::class, 'show'])->name('tipDetails');

    // wanita thayi it2afichan page thamazwat n dashboard user 
    // Route::get('/dashboardUser/{id}', [TypeStressController::class, 'test'])->name('typeStressUser');
    Route::get('/dashboardUser', [TypeStressController::class, 'test'])->name('dashboardUser');


    Route::get('/stressResult', function () {
        return view('utilisateurs.test');
    })->name('stress.test'); // anciennement 'stressResult'
    Route::get('/dashboardUser', function () {
        // Récupérer le premier résultat du test de stress de l'utilisateur connecté
        $stressResult = StressResult::where('user_id', auth()->id())->first();
    
        if ($stressResult && $stressResult->typeStress) {
            // Accéder au type de stress à travers la relation
            $type = $stressResult->typeStress; 
        } else {
            $type = null; // Aucun résultat trouvé ou pas de type de stress associé
        }
    
        return view('utilisateurs.dashboardUser', compact('type'));
    })->name('dashboardUser');
    


    Route::get('/typeStress', function () {
        return view('utilisateurs.typeStress');
    })->name('typeStress');
});





// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');





Route::post('/logout', [AuthController::class, 'logout'])->middleware("auth")->name('logout');
