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
                        <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item"> <span>{{ $category->name }}</span>  <a class="btn btn-primary float-right" href="{{ route('categories.edit', $category->id )}}">EDIT</a> </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
