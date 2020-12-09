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
                            <li class="list-group-item">
                               <div class="row">
                                    <div class="col-md-9">
                                        <span class="float-left">{{ $category->name }}</span>
                                    </div>


                                    <div class="col-md-3">
                                        <a class="btn btn-primary float-left" href="{{ route('categories.edit', $category->id )}}">EDIT</a>
                                        <form name="form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-right btn btn-danger">DELETE</button>
                                        </form>
                                    </div>
                               </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
