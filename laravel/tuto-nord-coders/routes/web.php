<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

// php artisan route:list pour debug

Route::get('/', [PostController::class, 'index'])->name('welcome');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts/update', [PostController::class, 'storeUpdate'])->name('posts.storeUpdate');

Route::get('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id')->name('posts.show');

Route::get('/contact', [PostController::class, 'contact'])->name('contact');

Route::get('/register', [PostController::class, 'register']);

// Route::get('posts', function () {
//     return Response()->json([
//         'title' => 'Mon titre',
//         'content' => 'c\'est génial',
//     ]);
// });

// Route::get('articles', function () {
//     return view('articles');
// });
