<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[AuthController::class,'index']);

Route::get('/Dashboard',[AuthController::class,'Dashboard']);

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

//////////////////////////////////////////// Products //////////////////////////////////////////////////

Route::get('/Products',[ProductController::class,'index']);

Route::get('/add-product',[ProductController::class,'afficherAddProduct']);

Route::get('/Products',[ProductController::class,'show']);

Route::post('/add-product',[ProductController::class,'add_product']);

Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);

Route::get('/update-product/{id}',[ProductController::class,'get_products']);

Route::post('/update/product',[ProductController::class,'update_products']);

// Route::get('/search',[ProductController::class,'search']);

//////////////////////////////////////////// Categories ////////////////////////////////////////////////

Route::get('/Categories',[CategoryController::class,'index']);

Route::get('/add-category',[CategoryController::class,'afficher_add_category']);

Route::post('/add-category',[CategoryController::class,'add_category']);

Route::get('/Categories',[CategoryController::class,'show']);

Route::get('/delete-category/{id}',[CategoryController::class,'delete_category']);

Route::get('/update-category/{id}',[CategoryController::class,'get_category']);

Route::post('/update/category',[CategoryController::class,'update_category']);
