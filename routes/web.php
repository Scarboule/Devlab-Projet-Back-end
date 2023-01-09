<?php

use App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use CodeBugLab\Tmdb\Facades\Tmdb;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::view('/genre', 'genre');
//Route::view('/', 'welcome');
//Route::view('/home', 'home');
/*Route::get('/home', function (){
    $tmdb = Tmdb::people()->popular()->get();
    return view('home', ['movies' => $tmdb]);
});*/
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/genre', function () {
    return view('genre');
})->middleware(['auth', 'verified'])->name('genre');

Route::get('/singlegenre/{id}', function ($id) {
    return view('singlegenre', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('singlegenre');

Route::get('/singlemovie/{id}', function ($id) {
    return view('singlemovie', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('singlemovie');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
