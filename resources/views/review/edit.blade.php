@extends('layouts.app')

@section('content')


     <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                @include('components.alert')
                <div class="card">
                    <div class="card-header">Edit Review for {{$review->for_product->name}}</div>

                    <div class="card-body">

                        <form action="{{ "/reviews/{$review->id}" }}" method="post">

                            @csrf
                            @method("PUT")

                            <div class="form-group row">

                                <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="7" name="review" style="width:30em;" required >{{$review->review}}</textarea>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="rating" class="col-md-4 col-form-label text-md-right">Rating</label>
                                <div class="col-md-6">
                                    <input class="form-control" style="width:30em;" id="rating" type="text" name="rating" required value="{{ $review->rating }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
