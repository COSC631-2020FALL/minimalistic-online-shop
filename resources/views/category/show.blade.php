@extends('layouts.app')

@section('content')


<div class="container">
        @include('components.alert')
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="h2 mb-4 text-center">
                    {{ $category->name }}
                </div>
                @each('components.product', $category->products, 'product')
            </div>
        </div>
</div>


@endsection
