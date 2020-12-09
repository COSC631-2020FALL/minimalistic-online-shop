@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span >Hello {{  Auth::user()->is_admin == true ? 'Administrator' : '' }}  {{ Auth::user()->name }}, Welcome to {{ env('APP_NAME')}}</span>

                    <hr>

                    <div class="text-center container">
                        <div class="row">
                            <a href="{{ route( 'products.index', ['invenory' => true] ) }}" class="btn btn-outline-primary btn-block">
                                ADD ITEMS TO YOUR INVENTORY
                            </a>
                        </div>
                        <hr>
                        <div class="h2">OR</div>
                        <hr>
                        <div class="row">
                            <a href="/" class="btn btn-outline-primary btn-block">
                                START SHOPPING
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
