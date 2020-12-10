@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                @include('components.alert')
                <div class="card">
                    <div class="card-header">Product Reviews</div>
                    <div class="card-body">
                        <ul class="list-group">
                        @foreach ($reviews as $review)
                            <li class="list-group-item">

                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="float-left">
                                            <a href="{{ route('reviews.show', $review->id )}}"> {{ $review->review}}  </a>
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <span class="float-left">
                                            <a href="{{ route('products.show', $review->for_product )}}"> {{ $review->for_product->name}}  </a>
                                        </span>
                                    </div>

                                    <div class="col-md-3">

                                        <form name="form-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-right btn btn-danger" >DELETE</button>
                                        </form>
                                        <a href="{{ route('users.edit', $review->id) }}" class="btn btn-primary float-left">EDIT</a>
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
