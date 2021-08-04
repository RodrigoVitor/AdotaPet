<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PetController::class, 'index']);
Route::get('/pet/create', [PetController::class, 'create'])->middleware('auth')->name('pet.create');
Route::get('/meuspets/{id}', [PetController::class, 'show'])->middleware('auth')->name('pet.show');
Route::delete('pet/delete/{id}', [PetController::class, 'destroy'])->middleware('auth')->name('pet.destroy');

Route::post('/pet/create', [PetController::class, 'store'])->middleware('auth')->name('pet.store');

// Usuarios
Route::get('/perfil/{id}', [UserController::class, 'showPerfil'])->middleware('auth')->name('user.showperfil');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('auth')->name('user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->middleware('auth')->name('user.delete');

Route::get('/dashboard', [PetController::class, 'dashboard'])->middleware('auth')->name('pet.dashboard');

require __DIR__.'/auth.php';
