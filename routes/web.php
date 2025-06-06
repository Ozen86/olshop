<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorMainController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorStoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::controller(AdminMainController::class)->group(function (){
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/user', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manage.stores');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function (){
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });
        Route::controller(SubCategoryController::class)->group(function (){
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
        });
        Route::controller(ProductController::class)->group(function (){
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'manage')->name('product.review.manage');
        });
        Route::controller(ProductAttributeController::class)->group(function (){
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage');
        });
        Route::controller(DiscountController::class)->group(function (){
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });

        Route::controller(MainCategoryController::class)->group(function (){
            Route::post('/store/category', 'storecat')->name('store.cat');
            Route::get('/category/{id}', 'showcat')->name('show.cat');
        });
    });
   
});


//Vendor routes
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function (){
        Route::controller(VendorMainController::class)->group(function (){
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'orderhistory')->name('vendor.order.history');
        });

        Route::controller(VendorStoreController::class)->group(function (){
            Route::get('/store/create', 'index')->name('vendor.store');
            Route::get('/store/manage', 'manage')->name('vendor.store.manage');
        });

        Route::controller(VendorProductController::class)->group(function (){
            Route::get('/product/create', 'index')->name('vendor.product');
            Route::get('/product/manage', 'manage')->name('vendor.product.manage');
        });
    });
   
});

//customer routes
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('user')->group(function (){
        Route::controller(CustomerMainController::class)->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/order/history', 'history')->name('customer.history');
            Route::get('/setting/payment', 'payment')->name('customer.payment');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });

    });
   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
