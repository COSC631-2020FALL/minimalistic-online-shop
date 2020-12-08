@extends('layouts.app')

@section('content')


   <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order #{{$order->id}}</div>

                    <div class="card-body">

                          @include('components.order')

                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Owner</div>

                    <div class="card-body text-center">
                        <button type="button" class="btn btn-secondary">{{ $order->user->email }}</button>
                    </div>

                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Ordered Items</div>

                    <div class="card-body">
                        @if ($order->products->count() == 0)
                            <p>This order does not have any products yet. </p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($order->products as $product)
                                    <li class="list-group-item">
                                        <a href="{{ route("products.show", $product->id) }}">
                                            <span class="float-left">{{ $product->name }}</span>
                                            <span class="float-center">{{ $product->pivot->price }}</span>
                                            <span class="float-right">{{ $product->pivot->quantity }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
