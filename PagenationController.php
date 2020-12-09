<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class PagenationController extends Controller
{
    $products = DB::table('products')->pagenate(5);
	//return view('welcome',['products' => $product]);
	return view('welcome', ['products' => $products]);
}
