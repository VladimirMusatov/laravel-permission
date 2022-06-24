<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;

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

Route::middleware(['auth'])->group(function(){

Route::get('/dashboard',[MainController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/create_article',[MainController::class,'form'])->name('form');
Route::post('/store',[MainController::class,'store'])->name('store');

Route::get('/edit/{id}',[MainController::class,'edit'])->name('edit');
Route::post('/update/{id}',[MainController::class,'update'])->name('update');

Route::get('/delete/{id}',[MainController::class,'delete'])->name('delete');

Route::resource('roles',RoleController::class);
Route::get('/roles.destroy/{id}',[RoleController::class,'destroy'])->name('roles.destroy');

});

require __DIR__.'/auth.php';