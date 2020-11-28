@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($products) == 0)
                No search results found
                @else
                    @each('components.product', $products, 'product')
                @endif
            </div>
        </div>
    </div>

@endsection
