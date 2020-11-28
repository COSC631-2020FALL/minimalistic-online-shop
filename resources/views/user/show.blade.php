@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User | {{$user->name}}</div>

                    <div class="card-body text-center">

                        <a href="{{ route("users.edit", $user->id) }}">
                            <button class="btn btn-primary" type="submit">EDIT PROFILE</button>
                        </a>

                    </div>
                </div>
                <hr>
                <div class="card">

                    <div class="card-header">Order History</div>

                    <div class="card-body">

                        @each('components.order', $user->orders, 'order')

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
