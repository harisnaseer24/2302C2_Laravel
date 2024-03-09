<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [studentController::class,'welcome']);

Route::get('/products', [ProductController::class,'getProducts']);
Route::get('/deleteproduct/{id}', [ProductController::class,'deleteProduct']);


Route::get('/addproduct', [ProductController::class,'showAddProductForm']);
Route::post('/createproduct', [ProductController::class,'addProduct']);

//today
Route::get('/editproduct/{id}', [ProductController::class,'editProduct']);
Route::post('/updateproduct/{id}', [ProductController::class,'updateProduct']);


//Search
Route::get('/search', [ProductController::class,'searchProduct']);

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/login', [studentController::class,'login'] );

// Route::get('/signup', function () {
//     return view('signup');
// });
// Route::get('/logout', function () {
//     return view('welcome');
// });
// Route::get('/test', function () {
//     return view('test');
// });
