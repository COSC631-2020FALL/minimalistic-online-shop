<?php

use App\Category;
use App\Product;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome',['categories' => Category::all()]);
});

Route::get('/search',function(Request $request) {
    $products = collect();//empty
    if(strlen($request->search) != 0 )
        $products = Product::where('name','like','%'. $request->search .'%')->get();
    return view('product.search', ['products' => $products]);
})->name('search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController')->except(['create', 'store']);
Route::resource('products', 'ProductController');
Route::resource('tags', 'TagController');
Route::resource('orders', 'OrderController')->only(['index', 'show']);
Route::resource('reviews', 'ReviewController')->except(['create']);
Route::resource('carts', 'CartController');

Route::get('cart-checkout', 'CartController@checkout')->name('checkout');
Route::get('clear-cart', 'CartController@clear')->name('clear-cart');

Route::resource('categories', 'CategoryController');

Route::get('/admin', 'AdminController@admin')->name('admin');

Route::get('order-success', 'CartController@order_success')->name('order-successfull');

