@extends('layouts.app')

@section('content')


   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order | {{$order->id}}</div>

                    <div class="card-body">


                          {{ $order }}
                            <hr>
                          {{ $order->user }}
                            <hr>
                            @if ($order->products->count() == 0)
                                <p>This order does not have any products yet. </p>
                            @else
                                {{ $order->products }}
                            @endif




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
