<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart', ['products' => \Cart::getContent(), 'total' => \Cart::getTotal()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // \Cart::clear();
        $rules = [
            'item' => 'required|numeric',
            'quantity' => 'required|numeric|min:1'
        ];

        $this->validate($request, $rules);

        $product = Product::find($request->item);
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'associatedModel' => $product
        ];


        \Cart::add($item);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'quantity' => 'required'
        ];

        $this->validate($request, $rules);

        $product = Product::find($request->item);

        \Cart::update($product->id, ['quantity' => [
            'relative' => false,
            'value' => $request->quantity,
            ]
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
