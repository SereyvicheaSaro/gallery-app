<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

Route::get('/', function () {
    return view('home');
});
Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/upload', function () {
    return view('upload-form');
});

Route::post('/upload', [ImageUploadController::class, 'upload']);