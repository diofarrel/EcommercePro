<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_catagory', [AdminController::class, 'view_catagory']);

Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->middleware('usertype:1');

Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);

Route::get('/view_product', [AdminController::class, 'view_product'])->middleware('usertype:1');

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product'])->middleware('usertype:1');

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/orders', [AdminController::class, 'orders']);

Route::get('/orders_detail/{id}', [AdminController::class, 'order_detail'])->name('order-detail');

Route::post('/update_status_orders/{id}', [AdminController::class, 'update_status_orders']);

Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('/view_perusahaan', [AdminController::class, 'view_perusahaan'])->middleware('usertype:1');

Route::post('/add_perusahaan', [AdminController::class, 'add_perusahaan']);

Route::get('/show_perusahaan', [AdminController::class, 'show_perusahaan'])->middleware('usertype:1');

Route::get('/delete_perusahaan/{id}', [AdminController::class, 'delete_perusahaan']);

Route::get('/update_perusahaan/{id}', [AdminController::class, 'update_perusahaan']);

Route::post('/update_perusahaan_confirm/{id}', [AdminController::class, 'update_perusahaan_confirm']);

// HOME

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/checkout', [HomeController::class, 'checkout'],);

Route::get('/productpage', [HomeController::class, 'productpage']);

Route::get('/myorder', [HomeController::class, 'myorder']);

Route::get('/myorder_detail/{id}', [HomeController::class, 'myorder_detail']);

Route::get('/print_bill/{id}', [HomeController::class, 'print_bill']);
