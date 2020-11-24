@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">

        @include('components.product')

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
