<?php

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    $posts = Post::paginate(10);
    $categories = Category::get();
    return view('index', ['posts' => $posts, 'categories' => $categories]);
});

Route::get('/AddPost', [PostController::class, 'index'])->name('AddPost');
Route::post('/AddPost', [PostController::class, 'store']);
Route::patch('/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/category', [CategoryController::class,'index'])->name('category');
Route::post('/category', [CategoryController::class,'store']);
Route::patch('/category/{id}', [CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class,'destroy'])->name('category.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
