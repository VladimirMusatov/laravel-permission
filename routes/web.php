<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[MainController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/create_article',[MainController::class,'form'])->name('form');
Route::post('/store',[MainController::class,'store'])->name('store');

Route::get('/delete/{id}',[MainController::class,'delete'])->name('delete');

require __DIR__.'/auth.php';
