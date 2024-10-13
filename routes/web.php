<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', MainController::class);


Route::resource('products', ProductController::class);
