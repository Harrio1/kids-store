<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
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

// Главная страница
Route::get('/', [ProductController::class, 'index'])->name('home');

// Детальная страница продукта
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Маршруты для категорий
Route::get('/boys', [ProductController::class, 'boys'])->name('boys');
Route::get('/girls', [ProductController::class, 'girls'])->name('girls');
Route::get('/newborns', [ProductController::class, 'newborns'])->name('newborns');

// Новые маршруты для категорий (динамические)
Route::get('/category/{slug}', [CategoryController::class, 'view'])->name('category.view');

// Корзина
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Оформление заказа
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [OrderController::class, 'process'])->name('checkout.process');
Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');

// Статические страницы
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Маршруты аутентификации
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Маршруты регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Маршруты для администратора (требуют наличия роли admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Админ-панель
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Управление пользователями
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{id}/edit-role', [AdminController::class, 'editUserRole'])->name('users.edit-role');
    Route::put('/users/{id}/update-role', [AdminController::class, 'updateUserRole'])->name('users.update-role');
    
    // Список товаров в админке
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
    
    // Ресурсные маршруты для CRUD операций с товарами
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    
    // Ресурсные маршруты для CRUD операций с категориями
    Route::resource('categories', CategoryController::class);
    
    // Управление заказами
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.status');
});

// Маршруты для пользователей (требуют аутентификации)
Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
    Route::get('/', function () {
        return view('account.dashboard');
    })->name('dashboard');
    
    // Заказы пользователя
    Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'userOrderDetail'])->name('orders.show');
    
    // Профиль пользователя
    Route::get('/profile', function () {
        return view('account.profile');
    })->name('profile');
    
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});