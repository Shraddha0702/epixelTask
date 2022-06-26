<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\product_controller;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::get('/registration',[CustomAuthController::class,'registration']);
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard']);
route::get('/userid)',[CustomAuthController::class,'registerUser']);
route::get('/logout',[CustomAuthController::class,'logout']);
route::view('/product','product');
Route::get('/product-list', [product_controller::class, 'productList'])->name('productList');

route::view('product','inspadd-product');
Route::post('/add-product', [product_controller::class, 'addProduct']);

Route::get('/product-edit/{id}', [product_controller::class, 'editProduct']);
Route::put('/update-product/{id}', [product_controller::class, 'updateProduct']);



Route::delete('/delete', [product_controller::class, 'deleteProduct1']);
Route::delete('/product-recycle', [product_controller::class, 'recycleProduct']);