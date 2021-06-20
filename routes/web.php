<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\ContactEdit;
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
    return view('welcome');
});

Route::get('/posts/create', fn() => view('post-form'));

Route::get('/contact', fn() => view('contact-form'));
Route::get('/contact/{contact}/edit', ContactEdit::class);

Route::get('/search', fn() => view('search-dropdown'));

Route::get('/table', fn() => view('data-table'));

Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
