<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\SocialController;
use App\Http\Controllers\Api\ContactController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/slider',[SliderController::class, 'index']); 
Route::get('/category',[CategoryController::class, 'index']); 
Route::get('/products',[ProductController::class, 'index']); 
Route::get('/about',[AboutController::class, 'index']); 
Route::get('/contact-info',[ContactInfoController::class, 'index']); 
Route::get('/social',[SocialController::class, 'index']); 
Route::post('/contact',[ContactController::class, 'store'])->name('contact.store'); 
// Route::apiResource('/service',ServiceController::class)->only(['index','show']); 
