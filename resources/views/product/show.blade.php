@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Product | {{$product->name}}</div>
               <div class="card-body">
                          <!-- $product-->
                  <div class="card-body">

                    <div class="col-md-6 float-left">
                        <img class="rounded float-left" style="position: relative; width:100%;height:100%;" src='{{ $product->img_url }}' />
                    </div>


                    <div class="col-md-6 float-right">

                        <form action="{{route('carts.store', $product->id)}}" method="post">
                            @csrf
                            <span class="row">{{ $product->name }}</span>
                            <br>
                            <span class="row">{{ $product->description }}</span>
                            <br>
                            <span class="row">$ {{ $product->price }}</span>
                            <br>
                            <span class="row">
                                <input type="range" name="quantity" value="{{$product->quantity}}">
                            </span>
                            <br>
                            <span class="row">

                                <button type="submit" class="btn btn-outline-primary">ADD TO CART</button>

                            </span>
                        </form>
                    </div>

                  </div>
               </div>
         </div>

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
