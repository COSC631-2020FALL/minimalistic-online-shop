@extends('layouts.app')

@section('content')


     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Review for {{$review->for_product->name}}</div>

                    <div class="card-body">

                        <form action="{{ "/reviews/{$review->id}" }}" method="post">

                            @csrf
                            @method("PUT")

                            <div class="form-group row">

                                <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                                <div class="col-md-6">
                                    <textarea id="review" name="review" style="width:30em;" required >{{$review->review}}</textarea>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="rating" class="col-md-4 col-form-label text-md-right">Rating</label>
                                <div class="col-md-6">
                                    <input id="rating" type="text" name="rating" required value="{{ $review->rating }}">
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
