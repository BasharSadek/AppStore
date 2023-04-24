<?php


use App\Http\Controllers\Dashboard\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/addAdmin', [SuperAdminController::class, 'addAdmin'])->name('addAdmin');
Route::post('/supercreateAdmin', [SuperAdminController::class, 'supercreateAdmin'])->name('supercreateAdmin');
Route::get('/allAdmin', [SuperAdminController::class, 'allAdmin'])->name('allAdmin');
Route::get('/deleteAdmin/{id}', [SuperAdminController::class, 'deleteAdmin'])->name('deleteAdmin');
Route::get('/editAdmin/{id}', [SuperAdminController::class, 'editAdmin'])->name('editAdmin');
Route::post('/updateAdmin/{id}', [SuperAdminController::class, 'updateAdmin'])->name('updateAdmin');
Route::get('/settingsSuperAdmin', [SuperAdminController::class, 'settingsSuperAdmin'])->name('settingsSuperAdmin');
Route::get('/saveSettingsSuperAdmin', [SuperAdminController::class, 'saveSettingsSuperAdmin'])->name('saveSettingsSuperAdmin');
Route::get('/profileSuperAdmin', [SuperAdminController::class, 'profileSuperAdmin'])->name('profileSuperAdmin');
Route::get('/saveProfileSuperAdmin', [SuperAdminController::class, 'saveProfileSuperAdmin'])->name('saveProfileSuperAdmin');
Route::get('/usersDeleted', [SuperAdminController::class, 'usersDeleted'])->name('usersDeleted');
Route::get('/deleteUserForce/{id}', [SuperAdminController::class, 'deleteUserForce'])->name('deleteUserForce');
Route::get('/restoreUsers/{id}', [SuperAdminController::class, 'restoreUsers'])->name('restoreUsers');
Route::get('/programDeleted', [SuperAdminController::class, 'programDeleted'])->name('programDeleted');
Route::get('/deleteProgramForce/{id}', [SuperAdminController::class, 'deleteProgramForce'])->name('deleteProgramForce');
Route::get('/restorePrograms/{id}', [SuperAdminController::class, 'restorePrograms'])->name('restorePrograms');
Route::get('/deleteCommentForce/{id}', [SuperAdminController::class, 'deleteCommentForce'])->name('deleteCommentForce');
Route::get('/restoreComments/{id}', [SuperAdminController::class, 'restoreComments'])->name('restoreComments');
Route::get('/CommentsDeleted', [SuperAdminController::class, 'CommentsDeleted'])->name('CommentsDeleted');
Route::get('/send_email/{id}', [SuperAdminController::class, 'send_email'])->name('send_email');
Route::post('/sendUserEmail/{id}', [SuperAdminController::class, 'sendUserEmail'])->name('sendUserEmail');
