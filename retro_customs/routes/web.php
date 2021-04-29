<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuildOrderController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

// About
Route::get('/about', function () {
    return view('about');
});


//LOGIN USER ACCOUNT
Route::get('/login', [UserController::class, 'login_form']);
Route::post('/login', [UserController::class, 'login']);

//REGISTER USER ACCOUNT
Route::get('/register', [UserController::class, 'register_form']);
Route::post('/register', [UserController::class, 'register']);

//lOGOUT ACCOUNT
Route::get('/logout', [UserController::class, 'not_clicked']);
Route::post('/logout', [UserController::class, 'logout']);

//PROFILE ACCOUNT
Route::resource('/profile', ProfileController::class);

//Console route
Route::resource('/consoles', ConsoleController::class);
Route::patch('/consoles/{id}/restore', [ConsoleController::class, 'restore']);

//Parts route
Route::resource('consoles.parts', PartController::class)->shallow();
Route::patch('/parts/{id}/restore', [PartController::class, 'restore']);

//User Address Route Controller
Route::resource('/profile/{id}/addresses', AddressController::class)->shallow();

// Products
Route::get('/products', [ProductController::class, 'index']);
Route::any('/products/filter', [ProductController::class, 'filter']);

// Build-to-Order Route
Route::get('/consoles/{id}/build_order', [BuildOrderController::class, 'index']);
Route::post('/consoles/{id}/build_order', [BuildOrderController::class, 'store']);

// User Orders Route
Route::get('/orders', [OrderController::class, 'index']);
