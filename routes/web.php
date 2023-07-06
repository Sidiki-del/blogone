<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add_category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add_category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    // Route::get('delete_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('delete_category', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('add_post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add_post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update_post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    Route::get('delete_post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('/user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('/update_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);



});



