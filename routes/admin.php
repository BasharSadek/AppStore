<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;

Route::get('/viewClients', [AdminController::class, 'viewClients'])->name('viewClients');
Route::get('/deleteClientAdmin/{id}', [AdminController::class, 'deleteClientAdmin'])->name('deleteClientAdmin');
Route::get('/profileAdmin', [AdminController::class, 'profileAdmin'])->name('profileAdmin');
Route::post('/saveProfileAdmin', [AdminController::class, 'saveProfileAdmin'])->name('saveProfileAdmin');
Route::get('/createProgram', [AdminController::class, 'createProgram'])->name('createProgram');
Route::post('/storeProgram', [AdminController::class, 'storeProgram'])->name('storeProgram');
Route::get('/indexProgram', [AdminController::class, 'indexProgram'])->name('indexProgram');
Route::get('/deleteProgram/{id}', [AdminController::class, 'deleteProgram'])->name('deleteProgram');
Route::get('/editProgram/{id}', [AdminController::class, 'editProgram'])->name('editProgram');
Route::post('/updateProgram/{id}', [AdminController::class, 'updateProgram'])->name('updateProgram');
Route::get('/Comments', [AdminController::class, 'indexComments'])->name('indexComments');




