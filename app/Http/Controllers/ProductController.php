<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Tag;
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

        return view('product.create',['user' => Auth::user(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'img_url'=>'required|active_url',
            'price'=>'required|numeric|gt:0|numeric',
            'owner_id'=>'required',
            'tags' => 'required'
        ];

        $this->validate($request, $rules);

        $product = Product::create($request->except('tags'));

        $product->tags()->sync($request->tags);

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
        $tags = Tag::all();
        return view('product.edit',['product' => $product, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return view('product.index');//redirect(route('products.index'));
        $rules = [
            'name'=>'required',
            'description'=>'string|max:255',
            'img_url'=>'required|active_url',
            'price'=>'required|numeric|gt:0|numeric|lt:10000'
        ];
        $this->validate($request,$rules);
        $product->update($request->all());

        $product->save();

        return redirect()->route('products.index', ['inventory' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index', ['inventory' => true]);
    }
}
