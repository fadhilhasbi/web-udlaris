<?php

use App\Livewire\CheckoutPage;
use App\Livewire\CustomTableMejaPanjang;
use App\Livewire\CustomTablePage;
use App\Livewire\HomePage;
use App\Livewire\ProductCustomPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;

use Illuminate\Support\Facades\Route;

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

Route::get('/', HomePage::class)->name('home');
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);
Route::get('/cart', CartPage::class);
Route::get('/checkout', CheckoutPage::class);

Route::get('/product-custom', ProductCustomPage::class);
Route::get('/product-custom/meja', CustomTablePage::class);
Route::get('/product-custom/meja/meja-panjang', CustomTableMejaPanjang::class);

Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/products/{product}', ProductDetailPage::class);
Route::get('/cart', CartPage::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
