<?php
use App\Http\Controllers\auth_controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\edit_store;
use App\Http\Controllers\new_blogs;
use App\Http\Controllers\new_orders;
use App\Http\Controllers\order_controller;
use App\Http\Controllers\product_categories;
use App\Http\Controllers\product_controller;
use App\Http\Controllers\product_slider;
use App\Http\Controllers\store_subscribers;
use App\Http\Controllers\user_queries;
use Illuminate\Support\Facades\Route;


Route::get('/',[Controller::class,'home']);
Route::get('/about',[Controller::class,'about']);
Route::get('/contact',[Controller::class,'contact']);
Route::get('/products',[Controller::class,'products']);
Route::get('/product/{id}',[Controller::class,'product']);
Route::get('/search',[Controller::class,'search']);
Route::get('/auth',[Controller::class,'auth']);
Route::get('/cart',[Controller::class,'cart']);
Route::get('/redirect',[Controller::class,'redirect']);
Route::post('signup',[auth_controller::class,'signup']);
Route::post('login',[auth_controller::class,'login']);
Route::post('forgotPassword',[Controller::class,'forgotPassword']);
Route::post('the_products',[product_controller::class,'the_products']);
Route::get('delete/{id}',[product_controller::class,'delete']);
Route::post('the_categories',[product_categories::class,'the_categories']);
Route::get('/cetrgories',[Controller::class,'filter_catg']);
Route::post('the_slider',[product_slider::class,'the_slider']);

Route::post('store_details',[edit_store::class,'store_details']);
Route::post('new_subscriber',[store_subscribers::class,'new_subscriber']);
Route::post('new_queries',[user_queries::class,'new_queries']);
Route::post('place_order',[new_orders::class,'place_order']);
Route::post('post_blog',[new_blogs::class,'add_blog']);
Route::get('/blogs',[Controller::class,'blogs']);
Route::get('/single/{id}',[Controller::class,'single']);