<?php

use App\Http\Controllers\PagesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//hello world
Route::get('/home',[PagesController::class,'index'])->name('home');

//Group users controller
Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->name('users.index');
    //create user
    Route::get('/users/create','create')->name('users.create');
    //store user
    Route::post('/users','store')->name('users.store');
    //edit users
    Route::get('/users/{user}/edit','edit')->name('users.edit');
    //update users
    Route::put('/users/{user}','update')->name('users.update');
});
