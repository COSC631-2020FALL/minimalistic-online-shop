@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Categories</span>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">CREATE CATEGORIES</a>
                    </div>

                    <div class="card-body">

                        @foreach ($categories ?? [] as $category)

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
