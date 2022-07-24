<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard',[MainController::class, 'index'])->middleware(['auth'])->name('dashboard')->middleware('can:show posts');
Route::get('/create_article',[MainController::class,'form'])->middleware('can:add posts')->name('form');
Route::post('/store',[MainController::class,'store'])->middleware('can:add posts')->name('store');

Route::get('/edit/{id}',[MainController::class,'edit'])->middleware('can:edit posts')->name('edit');
Route::post('/update/{id}',[MainController::class,'update'])->middleware('can:edit posts')->name('update');

Route::get('/delete/{id}',[MainController::class,'delete'])->middleware('can:delete posts')->name('delete');

Route::group(['middleware' => ['role:super-user']], function () {
    Route::resource('roles',RoleController::class);
    Route::get('/roles.destroy/{id}',[RoleController::class,'destroy'])->name('roles.destroy');

    Route::resource('users', UserController::class);
    Route::get('/users.destroy/{id}',[UserController::class, 'destroy'])->name('users.destroy');
});



});

require __DIR__.'/auth.php';