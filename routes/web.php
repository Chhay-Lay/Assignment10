<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/category', [CategoryController::class,'index'])->name('category');
Route::post('/category', [CategoryController::class,'store']);
Route::patch('/category/{category}', [CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class,'destroy'])->name('category.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
