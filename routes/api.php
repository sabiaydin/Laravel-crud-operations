<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User routes
Route::apiResource('users', UserController::class);

// Post routes
Route::apiResource('posts', PostController::class);

// Profile routes
Route::apiResource('profiles', ProfileController::class);

// Comment routes
Route::apiResource('comments', CommentController::class);

// Role routes
Route::apiResource('roles', RoleController::class);

//Bu her bir Model ucun ayri sekilde route yaratmagin diger yoludur,diger Modeller ucunde beledir:
// Route::get('/user',[UserController::class,'index'])->name('user.index');
// Route::post('/user',[UserController::class,'store'])->name('user.store');
// Route::get('/user/{id}',[UserController::class,'show'])->name('user.show');
// Route::get('/user/{id}',[UserController::class,'index'])->name('user.update');
// Route::get('/user/{id}',[UserController::class,'index'])->name('user.destroy');