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
                    <div class="card-header">Ordered Products</div>

                    <div class="card-body">
                        @if ($order->products->count() == 0)
                            <p>This order does not have any products yet. </p>
                        @else
                            <ul class="list-group list-group-flush">
                            @foreach ($order->products as $product)


                                <li class="list-group-item">

                                    <div class="row">

                                        <div class="col-md-5">
                                            <span class="float-left">
                                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                            </span>
                                        </div>

                                        <div class="col-md-4">
                                            <span class="float-left">
                                                {{ $product->pivot->price }}
                                            </span>
                                        </div>

                                        <div class="col-md-3">
                                            <span class="float-left">
                                                {{ $product->pivot->quantity }}
                                            </span>
                                        </div>
                                    </div>
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
