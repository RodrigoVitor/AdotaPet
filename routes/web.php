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
// Usuarios
Route::get('/perfil/{id}', [UserController::class, 'showPerfil'])->middleware('auth')->name('user.showperfil');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('auth')->name('user.update');

Route::get('/dashboard', [PetController::class, 'dashboard'])->middleware('auth')->name('pet.dashboard');

require __DIR__.'/auth.php';
