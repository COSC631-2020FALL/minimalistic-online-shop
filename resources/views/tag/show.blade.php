@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tag | {{$tag->tag_name}}</div>

                    <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                   <a href="{{ route("tags.edit", $tag->id) }}">
                                        <button class="btn btn-primary" type="submit">EDIT</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Tagged Products</div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            @foreach ($tag->products as $product)
                                <li class="list-group-item"> <a href="{{ route('products.show', $product->id)}}"> {{ $product->name }} </a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
