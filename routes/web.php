<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

Route::get('/gallery', function () {
    return view('home');
});

Route::get('/upload', function () {
    return view('upload-form');
});

Route::post('/upload', [ImageUploadController::class, 'upload']);