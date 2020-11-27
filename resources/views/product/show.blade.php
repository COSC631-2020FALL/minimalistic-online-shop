@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">

        @include('components.product')

        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf

            <div class="col-md-12">
                <input type="text" hidden name="product_id" value="{{ $product->id }}">
                <input type="text" hidden name="rating" value="3">
                <div class="form-group row">
                    <textarea name="review" type="text" class="form-control" rows="6" required></textarea>
                </div>
                <div class="form-group row">
                    <button class="btn btn-primary btn-block" type="submit">SUBMIT REVIEW</button>
                </div>
            </div>
        </form>

        <hr>
         <div class="card">
             <div class="card-header"> Product Reviews </div>

             <div class="card-body">

                  @foreach ($reviews as $review)
                    <blockquote class="blockquote mb-0">
                        <p>{{ $review->review }}.</p>
                        <footer class="blockquote-footer">Reviewed by <cite title="Source Title"> {{ $review->review_owner->name }} </cite></footer>
                    </blockquote>
                    <hr>
                  @endforeach
             </div>
         </div>
      </div>
    </div>
</div>


@endsection
