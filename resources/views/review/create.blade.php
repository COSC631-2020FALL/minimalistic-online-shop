@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Review</div>

                    <div class="card-body">
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="product_id" class="col-md-4 col-form-label text-md-right">Product :</label>
                                <select id="product_id" name="product_id">
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="reviewer_id" class="col-md-4 col-form-label text-md-right">User :</label>
                                <select id="reviewer_id" name="reviewer_id">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="review" class="col-md-4 col-form-label text-md-right">Text Review</label>
                                <textarea id="review" name="review" style="width:30em;" required ></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="rating" class="col-md-4 col-form-label text-md-right">Rating :</label>
                                <input id="rating" type="text" name="rating" required value=""></input>
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
