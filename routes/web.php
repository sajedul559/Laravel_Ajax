<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StudentController;



Route::get('upload-images', [ ImageController::class, 'index' ]);
Route::post('upload-images', [ ImageController::class, 'storeImage' ])->name('images.store');

Route::get('/fetch-image', [ ImageController::class, 'fetchImage' ]);
Route::get('/edit-image/{id}', [ ImageController::class, 'editImage' ]);
Route::post('/update', [ ImageController::class, 'updateImage' ]);


Route::post('/delete/{id}', [ ImageController::class, 'deleteImage' ]);








Route::get('/student', [ StudentController::class, 'home' ]);
Route::post('student/upload', [ StudentController::class, 'uploadimage' ])->name('images.store');
Route::get('/fetchProducts',[StudentController::class,'fetchProducts'])->name('fetch.products');

Route::get('/', function () {
    return view('welcome');
});