<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/', [ProductController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/products', ProductController::class);
});
Route::get('/', function () {
    return view('home');
});

Route::get('/boys', function () {
    return view('boys.boys');
});

Route::get('/girls', function () {
    return view('girls.girls');
});

Route::get('/newborns', function () {
    return view('kids.newborns');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/boys', function () {
    return view('boys.boys');
});

Route::get('/girls', function () {
    return view('girls.girls');
});
