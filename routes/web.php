<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;


// Route::get('/', function () {
//     return view('website.layout');
// });

// Route::get('/text', function () {
//     echo 'hello';
// });
Route::get('/', [AppController::class, 'main'])->name('/');
Route::get('/redirect', [AppController::class, 'redirect'])->name('redirect')
    ->middleware('auth', 'verified');
Route::get('/superAdmin', [AppController::class, 'superAdmin'])->name('superAdmin');
Route::get('/admin', [AppController::class, 'admin'])->name('admin');
Route::get('/welcome', [AppController::class, 'welcome'])->name('welcome');
Route::get('/games', [WebsiteController::class, 'games'])->name('games');
Route::get('/apps', [WebsiteController::class, 'apps'])->name('apps');
Route::get('/archive', [WebsiteController::class, 'archive'])->name('archive');
Route::get('/addTOArchiveProgram/{id}', [WebsiteController::class, 'addTOArchiveProgram'])->name('addTOArchiveProgram');
Route::get('/removeFromArchiveProgram/{id}', [WebsiteController::class, 'removeFromArchiveProgram'])->name('removeFromArchiveProgram');
Route::get('/showProgram/{id}', [WebsiteController::class, 'showProgram'])->name('showProgram');
Route::post('/download/{id}', [WebsiteController::class, 'download'])->name('download');
Route::get('/searchWebsite', [WebsiteController::class, 'searchWebsite'])->name('searchWebsite');
Route::get('/storeComment/{id}', [WebsiteController::class, 'storeComment'])->name('storeComment');
Route::get('/deleteComment/{comment_id}', [WebsiteController::class, 'deleteComment'])->name('deleteComment');
Route::post('/logoutWebsite', [WebsiteController::class, 'logoutWebsite'])->name('logoutWebsite');






Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {

    Route::get('/admin', function () {
        return view('website.layout');
    });
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
