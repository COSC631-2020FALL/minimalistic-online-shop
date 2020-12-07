@extends('layouts.app')
@section('content')
    <body>
        <div class="container">
            <div class="jumbotron">
                <img data-src="holder.js/100px250" class="img-fluid" alt="100%x250" style="height: 250px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22895%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20895%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17601576a73%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A45pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17601576a73%22%3E%3Crect%20width%3D%22895%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22332.390625%22%20y%3D%22145.165625%22%3E895x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            </div>
            @foreach($categories as $category)

                <div class="col-md-12 mb-5 mt-5">
                    <div class="h2 text-center">{{ $category->name }}</div>
                </div>

                <section class="col-md-12">


                    <div class="row">

                        @foreach($category->products as $product)
                            <div class="col-md-6">
                                @include('components.product')
                            </div>
                        @endforeach

                    </div>

                </section>
            @endforeach

            @section('footer')
                <div class="text-center">
                    <a href="{{ route('users.index') }}">Users</a>
                    <a href="{{ route('products.index') }}">Products</a>
                    <a href="{{ route('tags.index') }}">Tags</a>
                    <a href="{{ route('orders.index') }}">Orders</a>
                    <a href="{{ route('reviews.index') }}">Reviews</a>
                </div>
            @endsection

        </div>
    </body>
@endsection
