@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($products) == 0)
                <div class="text-center">No search results match your query</div>
                @else
                    @each('components.product', $products, 'product')
                @endif
            </div>
        </div>
    </div>

@endsection
