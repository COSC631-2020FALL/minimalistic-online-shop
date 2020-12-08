@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-12">
                    @include('components.alert')

                    <div class="row">
                        <a class="btn btn-danger" href="{{ route('clear-cart') }}">CLEAR CART</a>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Your Cart</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @each('components.cart-item', $products, 'product', 'components.empty.cart')
                            </div>
                            <div class="col-md-4">
                                @include('components.checkout')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
