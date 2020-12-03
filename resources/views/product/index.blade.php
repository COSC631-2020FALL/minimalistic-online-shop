@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <hr>
                @if ($inventory == true)
                    <div>
                        <a href="{{ route("products.create") }}">
                            <button class="btn btn-primary" type="submit">ADD PRODUCTS</button>
                        </a>
                    </div>
                @endif

                <hr>

                @each('components.product', $products, 'product')

            </div>
        </div>
    </div>

@endsection
