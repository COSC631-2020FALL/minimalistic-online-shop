<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\User;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['edit', 'store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inventory = false;
        if ($request->has('inventory') && Auth::check()){
            $products = Auth::user()->products;
            $inventory = true;
        } else {
            $products = Product::all();
        }
        return view('product.index', ['products' => $products, 'inventory' => $inventory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('product.create',['user' => Auth::user(), 'tags' => Tag::all(),'categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = Product::create(array_merge($request->except('tags')));
        $request->uploadImage($product)->storeImageUrlName();
        $product->tags()->sync($request->tags);

        $request->session()->flash('status', "{$product->name} was created");
        return redirect()->route('products.index', ['inventory' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews;
        return view('product.show',['product' => $product,'reviews'=>$reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',['user' => Auth::user(), 'product' => $product, 'tags' => Tag::all(),'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        $product->update($request->except('tags'));
        if ($request->has('img_url')){
            $request->uploadImage($product)->storeImageUrlName();
        }

        if ($request->tags){
            $product->tags()->sync($request->tags);
        }

        $product->save();
        $request->session()->flash('status', "{$product->name} was updated");
        return redirect()->route('products.index', ['inventory' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('status', "{$product->name} was removed");
        return redirect()->route('products.index', ['inventory' => true]);
    }
}
