<?php

use App\Product;
use App\Category;
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
    $products = Product::inRandomOrder()->limit(2)->get();
	$categories = Category::all();
    return view('welcome', ['products' => $products, 'categories' => $categories]);
});

Route::get('/search',function(Request $request) {
    $products = collect();//empty
    if(strlen($request->search) != 0 )
        $products = Product::where('name','like','%'. $request->search .'%')->get();
    return view('product.search', ['products' => $products]);
})->name('search');

Route::get('/search',function(Request $request) {
    $products = collect();//empty
	$categories = Category::all();
    if(strlen($request->search) != 0 )
        $products = Product::where('category_id','like','%'. (int)$request->search .'%')->get();
    return view('product.search', ['products' => $products, 'categories' => $categories]);
})->name('search');

//Route::get('/welcome', 'CategoryController@index')->name('category.index');
//Route::get('/search{category_id}', 'CategoryController@categoriesCheck')->name('category.show');
//Route::get('/', 'ShopController@show')->name('shop.show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
Route::resource('tags', 'TagController');
Route::resource('orders', 'OrderController')->only(['index', 'show']);
Route::resource('reviews', 'ReviewController');
Route::resource('carts', 'CartController');
//Route::resource('categories', 'CategoryController');
//Route::resource('groups', 'GroupController');

Route::get('cart-checkout', function(){
    return view('checkout');
})->name('checkout');
//Route::get('/search',function(Request $request) {
    //$products = collect();//empty
	//$cat = collect();//empty
    //if(strlen($request->search) != 0 )
        //$products = Product::where('category_id=4')->get();
		//$products = Product::where('id', 1)->firstOrFail();
    //return view('product.search', ['products' => $products]);
//})->name('search');

//Route::get('/search', 'CategoryController@getDisplay')->name('search');
//Route::get('/projects/display', 'CategoryController@getDisplay');

 //Route::get('/search', 'user\userController@search')->name('user.search');
//Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');

//DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ));
//Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@products']);


