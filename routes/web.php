<?php

use App\Livewire\CartPage;
use App\Livewire\FaqPage;
use App\Livewire\HomePage;
use App\Livewire\CancelPage;
use App\Livewire\MyOrderDetail;
use App\Livewire\MyOrderPage;
use App\Livewire\SuccessPage;
use App\Livewire\CheckoutPage;
use App\Livewire\ProductsPage;
use App\Livewire\CustomRakPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CustomChairPage;
use App\Livewire\CustomTablePage;
use App\Livewire\CustomCabinetPage;
use App\Livewire\ProductCustomPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CustomCreateRakPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\CustomCreateChairPage;
use App\Livewire\CustomCreateTablePage;
use App\Livewire\CustomCreateCabinetPage;
use App\Http\Controllers\MidtransController;

/*
|-------------------------------------------------------->>>>>>> develop------------------
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
Route::get('/faq', FaqPage::class);
Route::get('/my-order',MyOrderPage::class)->name('orders');
Route::get('/my-order/{order_id}', MyOrderDetail::class)->name('my-orders.show');

Route::get('/product-custom', ProductCustomPage::class);
Route::get('/product-custom/meja', CustomTablePage::class);
Route::get('/product-custom/rak', CustomRakPage::class);
Route::get('/product-custom/kursi', CustomChairPage::class);
Route::get('/product-custom/lemari', CustomCabinetPage::class);
Route::get('/product-custom/meja/{slug}', CustomCreateTablePage::class);
Route::get('/product-custom/rak/{slug}', CustomCreateRakPage::class);
Route::get('/product-custom/kursi/{slug}', CustomCreateChairPage::class);
Route::get('/product-custom/lemari/{slug}', CustomCreateCabinetPage::class);

Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('midtrans.notification');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/checkout', CheckoutPage::class);
    Route::get('/checkout/success/{order_id}', SuccessPage::class)->name('success');
    Route::get('/checkout/cancel/{order_id}', CancelPage::class)->name('cancel');
});
