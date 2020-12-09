@extends('layouts.app')

@section('content')


   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order #{{$order->id}}</div>

                    <div class="card-body text-center">
                        <div class="h1">You order has been successfully completed!</div>
                        <hr>
                        <div class="row">
                            <a href="/" class="btn btn-outline-primary btn-block">
                                CONTINUE SHOPPING
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection
