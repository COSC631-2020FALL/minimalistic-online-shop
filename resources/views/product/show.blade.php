@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">

        @include('components.product')

         <hr>
         <div class="card">
             <div class="card-header"> Product Reviews </div>

             <div class="card-body">

                  @foreach ($reviews as $review)
                  <div>
                     {{$review}}
                  </div>
                  @endforeach
             </div>
         </div>
      </div>
    </div>
</div>


@endsection
