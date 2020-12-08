@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       @include('components.left-nav')

    <div class="col-md-8">

        @include('components.product')
        
        @isnotadmin
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
        @endisnotadmin
        <hr>
         <div class="card">
             <div class="card-header"> Product Reviews </div>

             <div class="card-body">

                  @each('components.review', $reviews, 'review', 'components.empty.review')

             </div>
         </div>
      </div>
    </div>
</div>


@endsection
