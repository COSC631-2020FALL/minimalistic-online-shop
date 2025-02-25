@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">

                @include('components.alert')
                
                @if($inventory == true)
                @auth
                    <div>
                        <a href="{{ route("products.create") }}">
                            <button class="btn btn-primary" type="submit">ADD PRODUCTS</button>
                        </a>
                    </div>
                    <br>
                @endauth
                @endif
                @if($inventory == true)
                    @auth
                    @foreach(Auth::user()->products()->with('category')->has('category')->get() as $product)
                        @include('components.product',['product'=>$product,'inventory'=>$inventory])
                    @endforeach
                    @endauth
                @else       
                    @foreach(\App\Product::with('category')->has('category')->get() as $product)
                        @include('components.product',['product'=>$product,'inventory'=>$inventory])
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
