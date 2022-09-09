<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category.details');
Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class, 'resendActivationCode'])->name('code.resend');
Route::resource('products',ProductController::class);
Route::get('/products/category/{category}', [App\Http\Controllers\HomeController::class, 'getProductByCategory'])->name('category.products');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart');
Route::get('/add/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add.to.cart');
Route::put('/update/{product}/cart', [App\Http\Controllers\CartController::class, 'updateProductOnCart'])->name('update.cart');
Route::delete('/remove/{product}/cart', [App\Http\Controllers\CartController::class, 'removeProductFromCart'])->name('remove.cart');
Route::post('/handle-payment', [App\Http\Controllers\PaypalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('/cancel-payment', [App\Http\Controllers\PaypalPaymentController::class, 'payementCancel'])->name('cancel.payment');
Route::get('/succes-payment', [App\Http\Controllers\PaypalPaymentController::class, 'paymentSuccess'])->name('success.payment');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/log', [App\Http\Controllers\Auth\LoginController::class, 'log'])->name('log');
Route::get('/reg', [App\Http\Controllers\HomeController::class, 'createAccount'])->name('create.account');
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
Route::get('/admin/connexion', [App\Http\Controllers\AdminController::class,'showAdminLoginForm'])->name('admin.connexion');
Route::post('/admin/connexion', [App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.connexion');
Route::get('/admin/deconnexion', [App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.deconnexion');
Route::get('/admin/products', [App\Http\Controllers\AdminController::class,'getProducts'])->name('admin.products');
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class,'getOrders'])->name('admin.orders');
Route::get('/admin/categories', [App\Http\Controllers\AdminController::class,'getCategories'])->name('admin.categories');
Route::resource('orders',OrderController::class);
Route::resource('categories',CategoryController::class);
Route::resource('users',UserController::class);
Route::get('/admin/users', [App\Http\Controllers\AdminController::class,'getUsers'])->name('admin.users');

