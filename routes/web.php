<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/san-pham/danh-muc-{category_id}', [ClientProductController::class, 'index'])->name('client.products.index');
Route::get('/san-pham/chi-tiet-san-pham-{id}', [ClientProductController::class, 'show'])->name('client.products.show');






Auth::routes();



// route admin
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
    

    Route::resource('roles', RoleController::class);
    
    Route::resource('users', UserController::class);
    
    Route::resource('categories', CategoryController::class);
    
    Route::resource('products', ProductController::class);
    Route::resource('coupons', CouponController::class);



    Route::get('don-hang', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::post('cap-nhat-trang-thai-don-hang/{id}', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update_status');
});


Route::middleware('auth')->group(function() {
    Route::match(['get', 'post'], 'add-to-cart', [CartController::class, 'store'])->name('client.carts.add');
    Route::get('carts', [CartController::class, 'index'])->name('client.carts.index');
    Route::post('update-quantity-product-in-cart/{cart_product_id}', [CartController::class, 'updateQuantityProduct'])->name('client.carts.update_product_quantity');
    Route::post('remove-quantity-product-in-cart/{cart_product_id}', [CartController::class, 'removeProductInCart'])->name('client.carts.remove_product_in_cart');
    Route::match(['get', 'post'], 'apply-coupon', [CartController::class, 'applyCoupon'])->name('client.carts.apply_coupon');

    Route::match(['get', 'post'], 'checkout', [CartController::class, 'checkout'])->name('client.carts.checkout')->middleware('user.can_checkout_cart');
    Route::match(['get', 'post'], 'process-checkout', [CartController::class, 'processCheckout'])->name('client.carts.process')->middleware('user.can_checkout_cart');


    Route::get('list-orders', [OrderController::class, 'index'])->name('client.orders.index');
    Route::post('orders/cancel/{id}', [OrderController::class, 'cancel'])->name('client.orders.cancel');

});