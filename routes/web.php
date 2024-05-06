<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DiliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProcductController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/',[HomeController::class,'index']);// show page Home
Route::get('/trang-chu',[HomeController::class,'index']);// show page Home

//admin
Route::get('/admin',[AdminController::class,'login']);// show page login admin
Route::get('/dashboard',[AdminController::class,'index']);// show page dashboard after login
Route::post('/login-dashboard',[AdminController::class,'dashboard']);//form check request from user
Route::get('/logout',[AdminController::class,'logout']);// login out admin

//login facebook
Route::get('/login-facebook',[AdminController::class,'login_facebook']);
Route::get('/admin/callback',[AdminController::class,'callback_facebook']);

//login google
Route::get('/login-google',[AdminController::class,'login_google']);
Route::get('/google/callback',[AdminController::class,'callback_google']);

//category
Route::get('/add-category-product',[CategoryController::class,'add_category_product']);//show page add category
Route::get('/all-category-product',[CategoryController::class,'all_category_product']);//show page details info category
Route::post('/add-category',[CategoryController::class,'add_category']);//add category into DB
Route::get('/update-category-product/{category_id}',[CategoryController::class,'show_update_category_product']);//show page update category
Route::post('/update-category/{category_id}',[CategoryController::class,'update_category_product']);//click button update category
Route::get('/delete-category-product/{category_id}',[CategoryController::class,'delete_category_product']);//show confirm delete category
Route::post('/search-category-product',[CategoryController::class,'search_category_product']);//click button update category

//brand
Route::get('/add-brand-product',[BrandController::class,'add_brand_product']);//show page add brand
Route::get('/all-brand-product',[BrandController::class,'all_brand_product']);//show page  details info brand
Route::post('/add-brand',[BrandController::class,'add_brand']);//add brand into DB
Route::get('/update-brand-product/{brand_id}',[BrandController::class,'show_update_brand_product']);//show page update brand
Route::post('/update-brand/{brand_id}',[BrandController::class,'update_brand']);//click button update brand into DB
Route::get('/delete-brand-product/{brand_id}',[BrandController::class,'delete_brand_product']);//show confirm delete brand
Route::post('/search-brand-product',[BrandController::class,'search_brand_product']);//search brand product

//product
Route::get('/show-add-product',[ProcductController::class,'show_add_product']);//show page add product
Route::get('/all-product',[ProcductController::class,'all_product']);//show page details info product
Route::post('/add-product',[ProcductController::class,'add_product']);//add product into DB
Route::get('/show-update-product/{product_id}',[ProcductController::class,'show_update_product']);//show page update product
Route::post('/update-product/{product_id}',[ProcductController::class,'update_product']);//click button update product into DB
Route::get('/delete-product/{product_id}',[ProcductController::class,'delete_product']);//show confirm delete product
Route::post('/search-product',[ProcductController::class,'search_product']);//search product index
Route::post('/search-product-admin',[ProcductController::class,'search_product_admin']);//search product index

//coupon
Route::get('/show-add-coupon',[CouponController::class,'show_add_coupon']);//show page add coupon
Route::post('/add-coupon',[CouponController::class,'add_coupon']);//show page add coupon
Route::get('/list-coupon',[CouponController::class,'list_coupon']);//show list coupon
Route::get('/show-update-coupon/{coupon_id}',[CouponController::class,'show_update_coupon']);//show page update coupon
Route::post('/update-coupon/{coupon_id}',[CouponController::class,'update_coupon']);//update coupon
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon']);//delete coupon
Route::post('/search-coupon',[CouponController::class,'search_coupon']);//update coupon
Route::post('/check-coupon',[CouponController::class,'check_coupon']);//delete coupon

//order
Route::get('/manager-order',[OrderController::class,'manager_order']);//manager order
Route::get('/details-order/{orderId}',[OrderController::class,'details_order']);//show details order
Route::post('/search-order-details',[OrderController::class,'search_order_details']); //search order details
Route::get('print-order/{checkout_code}',[OrderController::class,'print_order']);

//index
Route::get('/show-product-category/{category_id}',[HomeController::class,'show_product_category']);//show product follow category
Route::get('/show-product-brand/{brand_id}',[HomeController::class,'show_product_brand']);//show product follow brand
Route::get('/show-detail-product/{product_id}',[HomeController::class,'show_detail_product']);//show product detail 

//cart
Route::get('/show-cart',[CartController::class,'show_cart']);//show your cart
Route::post('/save-cart/{product_id}',[CartController::class,'save_cart']);//add to cart
Route::post('/update-qty-cart',[CartController::class,'update_qty_cart']);//update cart
Route::delete('/delete-cart',[CartController::class,'delete_cart']);//delete cart


//send mail
Route::get('/send-mail',[MailController::class,'send_mail']);//send email

//login user checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);//show page user login checkout
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);//logout customer
Route::post('/user-signup',[CheckoutController::class,'user_signup']);// signup account
Route::post('/user-signin',[CheckoutController::class,'user_signin']);// signin account
Route::get('/checkout',[CheckoutController::class,'checkout']);//show page checkout
Route::get('/payment',[ShippingController::class,'payment']);//payment
Route::post('/order-place',[CheckoutController::class,'order_place']);//chosse payment method and payment succee
Route::post('/select-delivery-layout',[ShippingController::class,'select_delivery_layout']);//shipping fee charged when you choose address
Route::post('/calculate-fee',[ShippingController::class,'calculate_fee']);

//shipping
Route::post('/save-info-shipping',[ShippingController::class,'save_info_shipping']);// signup account

//dilivey
Route::get('/manager-delivery',[DeliveryController::class,'show_delivery']);//page add delivery
Route::post('/select-delivery',[DeliveryController::class,'select_delivery']);//page add delivery
Route::post('/insert-delivery',[DeliveryController::class,'insert_delivery']);//button add delivery
//Route::post('/select-feeship',[DeliveryController::class,'select_feeship']);//page add delivery
//Route::post('/update-delivery',[DeliveryController::class,'update_delivery']);//update fee tyoe table
Route::post('/update-fee-delivery/{fee_id}',[DeliveryController::class,'update_fee_delivery']);//update fee tyoe table
