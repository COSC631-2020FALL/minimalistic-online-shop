@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tag | {{$tag->tag_name}}</div>
                    <div class="card-body text-center">
                        <a href="{{ route("tags.edit", $tag->id) }}">
                            <button @isnotadmin {{ 'disabled' }} @endisnotadmin class="btn btn-primary" type="submit">EDIT TAG</button>
                        </a>
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
