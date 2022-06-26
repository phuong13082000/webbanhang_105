<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;

Route::prefix('admin')->group(function () {
//Admin
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
    Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);

//CategoryProduct
    Route::get('/add-category', [CategoryProductController::class, 'add_category']);
    Route::post('/save-category', [CategoryProductController::class, 'save_category']);
    Route::get('/edit-category/{category_product_id}', [CategoryProductController::class, 'edit_category']);
    Route::post('/update-category/{category_product_id}', [CategoryProductController::class, 'update_category']);
    Route::get('/delete-category/{category_product_id}', [CategoryProductController::class, 'delete_category']);
    Route::get('/all-category', [CategoryProductController::class, 'all_category']);
    Route::post('/export-csv', [CategoryProductController::class, 'export_csv']);
    Route::post('/import-csv', [CategoryProductController::class, 'import_csv']);
    Route::get('/unactive-category/{category_product_id}', [CategoryProductController::class, 'unactive_category']);
    Route::get('/active-category/{category_product_id}', [CategoryProductController::class, 'active_category']);

//Slider
    Route::get('/manage-slider', [SliderController::class, 'manage_slider']);
    Route::get('/add-slider', [SliderController::class, 'add_slider']);
    Route::get('/delete-slide/{slide_id}', [SliderController::class, 'delete_slide']);
    Route::post('/insert-slider', [SliderController::class, 'insert_slider']);
    Route::get('/unactive-slide/{slide_id}', [SliderController::class, 'unactive_slide']);
    Route::get('/active-slide/{slide_id}', [SliderController::class, 'active_slide']);

//Brand Product
    Route::get('/add-brand-product', [BrandProductController::class, 'add_brand_product']);
    Route::get('/edit-brand-product/{brand_product_id}', [BrandProductController::class, 'edit_brand_product']);
    Route::get('/delete-brand-product/{brand_product_id}', [BrandProductController::class, 'delete_brand_product']);
    Route::get('/all-brand-product', [BrandProductController::class, 'all_brand_product']);
    Route::get('/unactive-brand-product/{brand_product_id}', [BrandProductController::class, 'unactive_brand_product']);
    Route::get('/active-brand-product/{brand_product_id}', [BrandProductController::class, 'active_brand_product']);
    Route::post('/save-brand-product', [BrandProductController::class, 'save_brand_product']);
    Route::post('/update-brand-product/{brand_product_id}', [BrandProductController::class, 'update_brand_product']);

//Order
    Route::get('/delete-order/{order_code}', [OrderController::class, 'order_code']);
    Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);
    Route::get('/manage-order', [OrderController::class, 'manage_order']);
    Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
    Route::post('/update-order-qty', [OrderController::class, 'update_order_qty']);
    Route::post('/update-qty', [OrderController::class, 'update_qty']);

//Delivery
    Route::get('/delivery', [DeliveryController::class, 'delivery']);
    Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
    Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
    Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
    Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);

//Coupon
    Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
    Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
    Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
});

//Send Mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);

//Product
Route::get('/admin/add-product', [ProductController::class, 'add_product']);
Route::get('/admin/edit-product/{product_id}', [ProductController::class, 'edit_product']);

Route::get('users',
    [
        'uses' => [UserController::class, 'index'],
        'as' => 'Users',
        'middleware' => 'roles'
    ]);
//User
Route::get('/admin/add-users', [UserController::class, 'add_users']);
Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/impersonate/{id}', [UserController::class, 'impersonate']);
Route::post('/admin/store-users', [UserController::class, 'store_users']);
Route::post('/admin/assign-roles', [UserController::class, 'assign_roles']);
Route::post('/admin/delete-user/{id}', [UserController::class, 'destroy']);
Route::get('/admin/impersonate-destroy/{id}', [UserController::class, 'impersonate_destroy']);

Route::get('/admin/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/admin/all-product', [ProductController::class, 'all_product']);
Route::get('/admin/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/admin/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::post('/admin/save-product', [ProductController::class, 'save_product']);
Route::post('/admin/update-product/{product_id}', [ProductController::class, 'update_product']);

//Client
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/404', [HomeController::class, 'error_page']);
Route::post('/tim-kiem', [HomeController::class, 'search']);

//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}', [CategoryProductController::class, 'show_category_home']);
Route::get('/thuong-hieu/{brand_slug}', [BrandProductController::class, 'show_brand_home']);
Route::get('/chi-tiet/{product_slug}', [ProductController::class, 'details_product']);


//Cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']);

//Checkout
Route::get('/dang-nhap', [CheckoutController::class, 'login_checkout']);
Route::get('/del-fee', [CheckoutController::class, 'del_fee']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', 'CheckoutController@payment');
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee']);
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);

//Auth roles
Route::get('/register-auth', [AuthController::class, 'register_auth']);
Route::get('/login-auth', [AuthController::class, 'login_auth']);
Route::get('/logout-auth', [AuthController::class, 'logout_auth']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
