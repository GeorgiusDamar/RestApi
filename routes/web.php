<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodolistController;

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

// Route::get('/', function () {
//     return view('welcome');
// }); 

// Route::get('/', function() {
//     return view('login');
// });


Route::get('/', [LoginController::class, 'index'])->name('login');


Route::post('/login', [LoginController::class, 'loginProses'])->name('login-proses');
// gunakan prefix
Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function (){
    // Route::redirect('/home', '/user');
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::get('/todolist', [TodolistController::class, 'todolist'])->name('todolist');
    Route::post('/todolist', [TodolistController::class, 'store'])->name('store'); 
    Route::delete('/tasks/{task}', [TodolistController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('/tasks/{task}/complete', [TodolistController::class, 'complete'])->name('tasks.complete');

    // Route::get('/todo', [TodolistController::class, 'index'])->name('todo');
    // Route::post('/tasks', [TodolistController::class, 'store'])->name('tasks.store');
    // Route::patch('/tasks/{task}/complete', [TodolistController::class, 'complete'])->name('tasks.complete');
    // Route::delete('/tasks/{task}', [TodolistController::class, 'destroy'])->name('tasks.destroy');

});
                    
    // Route::get('/dashboard', [LoginController::class, 'halamanuser'])->name('halamanuser');
    // Route::post('/user', []);
    // Route::get('/owner', [OwnerController::class, 'homeowner'])->name('homeowner');
    // Route::get('/test', [MobilController::class, 'test'])->name('test');


    // //Mobil
    // Route::get('/mobilindex', [MobilController::class, 'index'])->name('mobilindex');
    // Route::get('/mobiltambah', [MobilController::class, 'create'])->name('tambahmobil'); //jalankan fn create untuk menampilkan form mobiltambah
    // Route::post('/mobiltambah', [MobilController::class, 'tambah'])->name('mobiltambah');

    // // route sama boleh asalkan methodnya beda
    // Route::get('/mobiledit/{id_mobil}', [MobilController::class, 'update'])->name('mobilupdate');
    // Route::post('/mobiledit/{id_mobil}', [MobilController::class, 'edit'])->name('mobiledit');
 
 


// logout 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
