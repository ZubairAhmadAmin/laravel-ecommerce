<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin-dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/search', [ProductController::class, 'product_search'])->name('product-search');
    Route::get('/orders', [ProductController::class, 'view_orders'])->name('orders');
    Route::get('/download_pdf/{id}', [ProductController::class, 'print_pdf'])->name('download');
    Route::resource('/users', UserController::class);

});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact');
    Route::get('/cart/{id}', [ProductController::class, 'add_cart'])->name('cart');
    Route::get('/mycart', [HomeController::class, 'mycart'])->name('mycart');
    Route::get('/remove_cart_product/{id}', [HomeController::class, 'remove_cart_product'])->name('remove-product');
    Route::post('/confirm_order', [HomeController::class, 'confirm_order'])->name('confirm-order');
    Route::get('/my_orders', [HomeController::class, 'my_orders'])->name('myorders');
    Route::get('/on_the_way/{id}', [ProductController::class, 'on_the_way'])->name('on-the-way');
    Route::get('/delivered/{id}', [ProductController::class, 'delivered'])->name('delivered');
});


