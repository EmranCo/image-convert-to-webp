<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image as InterventionImage;

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



Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');


Route::get('/download/{filename}' , [ImageController::class, 'download'])->name('images.download');
