<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[CrudController::class,'showAll'])->name('index');
Route::get('/create-user',[CrudController::class,'createUser'])->name('create');
Route::post('/new-user',[CrudController::class,'saveUser'])->name('save');
Route::get('/edit-user/{id}',[CrudController::class,'editUser'])->name('edit');
Route::put('/update-user/{id}',[CrudController::class,'updateUser'])->name('update');
Route::delete('/delete-user/{id}',[CrudController::class,'deleteUser'])->name('delete');