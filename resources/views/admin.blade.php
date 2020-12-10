@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administrator Dashboard</div>

                    <div class="card-body text-center">
                        <button class="h1 btn btn-outline-primary btn-lg">Welcome to your Admin Dashboard</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
