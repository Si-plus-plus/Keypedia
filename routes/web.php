<?php

use App\Http\Controllers\KeyboardCategoryController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');

Route::group([ 'prefix' => 'user', 'middleware' => 'guest' ], function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::group([ 'prefix' => 'user', 'middleware' => 'auth' ], function() {
    Route::get('/changepassword', [UserController::class, 'showPasswordForm'])->name('user.password');
    Route::post('/changepassword', [UserController::class, 'change'])->name('changePassword');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::resource('/category', KeyboardCategoryController::class);
Route::resource('/keyboard', KeyboardController::class);

Route::group([
    'prefix' => 'transaction',
    'as' => 'transaction.',
    'middleware' => 'auth',
], function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('/cart', [TransactionController::class, 'cart'])->name('cart');
    Route::post('/update', [TransactionController::class, 'update'])->name('update');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('/{transaction}', [TransactionController::class, 'show'])->name('show');
});
