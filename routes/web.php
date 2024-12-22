<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommerceController;
use Illuminate\Support\Facades\Auth;

Route::middleware("auth")->group(function () {

    Route::get('/index', [CommerceController::class, 'index'])->name('page.home');

    Route::get('/shop/{catid?}', [CommerceController::class, 'shop'])->name('page.shopping');

    Route::get('/about', [CommerceController::class, 'about'])->name('page.about');

    Route::get('/contact', [CommerceController::class, 'contact'])->name('page.contact');

    Route::post('/contact', [CommerceController::class, 'subcontact'])->name('page.subcontact');

    Route::get('/news', [CommerceController::class, 'news'])->name('page.news');

    Route::get('/cart/{id?}', [CommerceController::class, 'cart'])->name('page.cart');

    Route::get('/checkout', [CommerceController::class, 'checkOut'])->name('page.check_out');

    Route::get('/404', [CommerceController::class, 'erorr'])->name('page.404');

    Route::get('/single-news', [CommerceController::class, 'single_news'])->name('page.single-news');

    Route::get('/single-product', [CommerceController::class, 'single-product'])->name('page.single-product');

    Route::post('/addproduct/{id?}', [CommerceController::class, 'add_to_cart'])->name('addtocart');

    Route::get('/pro/{id?}', [CommerceController::class, 'update'])->name('page.update');

    Route::delete('/products/{product?}', [CommerceController::class, 'destroy'])->name('page.destroy');

    Route::post('/placeorder', [CommerceController::class, 'placeOrder'])->name('page.placeorder');

    Route::get('/search',[CommerceController::class,'search'])->name('search');
});
Route::get('/', function () {
    return to_route('login');
});


Route::get('/login', [CommerceController::class, 'login'])->name('login');

Route::get('/updatelogin', [CommerceController::class, 'updateLogin'])->name('page.updateLogin');

Route::get('/login-new-user', [CommerceController::class, 'loginNewUser'])->name('page.LoginNewUser');

Route::get('/update-login-new-user', [CommerceController::class, 'updateLoginNewUser'])->name('page.UpdateLoginNewUser');
