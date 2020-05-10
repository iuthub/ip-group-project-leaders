<?php

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

Route::get('/', "MainPageController@index")->name("main");

Route::get("/regpage", "RegistrationController@index")->name("registration");
Route::get("/catalog", "GoodsController@index")->name("catalog");
Route::get("/profile", "MainPageController@profilePage")->name("profile");
Route::post("/", "RegistrationController@register")->name("mainPage");
Route::post("/auth", "RegistrationController@authenticate")->name("authenticate");
Route::post("/search", "GoodsController@search")->name("querySearch");
Route::post("/order/{id}", "OrdersController@order")->name("order");
Route::get("/order/{id}", "OrdersController@order");
Route::post("/orders", "OrdersController@history")->name("history");
Route::post("/delete/{id}", "OrdersController@deleteItem")->name("deleteItem");
Route::post("/buy", "BoughtController@buy")->name("buy");

Route::get("/admin", "AdminController@index")->name("admin");
Route::post("/admin/store", "AdminController@store")->name("storeProduct");

Auth::routes();
