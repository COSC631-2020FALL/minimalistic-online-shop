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
                    <textarea name="review" type="text"
                        class="form-control @error('haspurchased') is-invalid @enderror"
                        rows="6" required></textarea>

                    @error('haspurchased')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                        <footer class="blockquote-footer">Reviewed by <cite title="Source Title"> {{ $review->review_owner->name }} </cite>
                            <span class="ml-1">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <span> @include('icons.star') </span>
                                @endfor
                            </span>
                        </footer>
                    </blockquote>
                    <hr>
                  @endforeach

                  @if ($reviews->count() == 0)
                    <div class="center-text">Product has no reviews</div>
                  @endif
             </div>
         </div>
      </div>
    </div>
</div>


@endsection
