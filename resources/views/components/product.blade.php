<div class="card">
            <div class="card-header"> <a href="{{ route('products.show', $product->id)}}"> Product | {{$product->name}} </a> </div>
               <div class="card-body">

                  <div class="card-body">

                    <div class="col-md-6 float-left">
                        <a href="{{ route('products.show', $product->id)}}">
                            <img class="rounded float-left" style="position: relative; width:100%;height:100%;" src='{{ $product->img_url }}' />
                        </a>
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
