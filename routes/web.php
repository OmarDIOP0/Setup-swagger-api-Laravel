<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\UserController;

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

Route::get('/', [UserController::class,'index']);
// Route::get('/api/users', [UserController::class, 'getForm']);
Route::post('/api/users', [UserController::class, 'store']);
Route::get('/api/product',[ProductController::class,'index']);
Route::get('/delete/{id}',[UserController::class,'destroy'])->name('delete-user');
