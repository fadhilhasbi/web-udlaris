<?php

use App\Livewire\CustomTableMejaPanjang;
use App\Livewire\CustomTablePage;
use App\Livewire\HomePage;
use App\Livewire\ProductCustomPage;
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
Route::get('/product-custom', ProductCustomPage::class);
Route::get('/product-custom/meja', CustomTablePage::class);
Route::get('/product-custom/meja/meja-panjang', CustomTableMejaPanjang::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
