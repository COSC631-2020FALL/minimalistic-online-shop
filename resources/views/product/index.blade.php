@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">

                @include('components.alert')

                @if ($inventory == true)
                    <div>
                        <a href="{{ route("products.create") }}">
                            <button class="btn btn-primary" type="submit">ADD PRODUCTS</button>
                        </a>
                    </div>
                    <br>
                @endif

                @each('components.product', $products, 'product')

            </div>
        </div>
    </div>

@endsection
