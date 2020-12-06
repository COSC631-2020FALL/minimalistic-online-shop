@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-8">
                    <div class="row text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                {{-- <hr> --}}
                <br>
                @if ($inventory == true)
                    <div>
                        <a href="{{ route("products.create") }}">
                            <button class="btn btn-primary" type="submit">ADD PRODUCTS</button>
                        </a>
                    </div>
                @endif

                <br>

                @each('components.product', $products, 'product')

            </div>
        </div>
    </div>

@endsection
