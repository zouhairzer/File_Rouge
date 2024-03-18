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


////////////////////////////////////////// Authentification /////////////////////////////////////////////

Route::get('/Dashboard',[AuthController::class,'Dashboard']);

Route::get('/',[AuthController::class,'index']);

Route::get('/register', [AuthController::class,'AfficherRegister']);

Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'AfficherLogin']);

Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', [AuthController::class,'logout']);

////////////////////////////////////////// Forgot Password //////////////////////////////////////////////

Route::get('/forgot_password',[AuthController::class, 'forgot']);

Route::post('/forgot_password',[AuthController::class, 'forgotPasword']);

////////////////////////////////////////// Reset Password //////////////////////////////////////////////

Route::get('/reset/{token}',[AuthController::class,'afficheReset']);

Route::post('/reset/{token}',[AuthController::class,'ResetPassword']);