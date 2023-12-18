<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AttractionController::class, 'index']);

Route::get('/attractions/create', [AttractionController::class, 'create']);

Route::post('/attractions/store', [AttractionController::class, 'store'])->name('attractions.store');

Route::get('/attractions/{id}', [AttractionController::class, 'show'])->name('attractions.show');

//Route::post('/user/{userId}/attractions/add', [AttractionController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/{userId}/attractions', [AttractionController::class, 'showUserAttractions']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
