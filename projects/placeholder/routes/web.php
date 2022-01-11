<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
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

Route::get('/', [IndexController::class, 'indexAction'])->name('index');

// Pages handler
Route::get('/pages/{id}', [PageController::class, 'indexAction'])->name('pages');

// Post handler
Route::get('posts/{id}', [PostController::class, 'indexAction'])->name('posts');

// contact us
Route::get('/contact-us', [ContactController::class, 'indexAction'])->name('contact_us_form');
Route::post('/contact-us', [ContactController::class, 'handleAction'])->name('contact_us_submitted');
