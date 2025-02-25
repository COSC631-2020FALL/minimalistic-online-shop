@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Orders</span>
                    </div>

                    <div class="card-body">
                        @each('components.order', $orders, 'order')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
