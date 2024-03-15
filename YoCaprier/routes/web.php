<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/Dashboard',[AuthController::class,'Dashboard']);

Route::get('/',[AuthController::class,'index']);

Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'AfficherLogin']);

Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', [AuthController::class,'logout']);
