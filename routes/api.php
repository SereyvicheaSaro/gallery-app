<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/storeImage', [HomeController::class, 'storeImage']);

Route::post('/upload', [ImageUploadController::class, 'store'])->name('upload.image');

Route::post('/test', [HomeController::class, 'test']);