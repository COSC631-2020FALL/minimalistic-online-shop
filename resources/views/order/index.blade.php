@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Orders</span>
                    </div>

                    <div class="card-body">
                       <table>
                            <thead>
                                <tr>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- {{ $orders }} --}}
                                    @foreach ($orders as $order)
                                        <a href="{{ route('orders.show', $order->id)}}"> Order-{{ $order->id}}</a>
                                        <br>
                                    @endforeach
                                </tr>
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
