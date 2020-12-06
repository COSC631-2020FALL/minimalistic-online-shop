<div class="card">
    <div class="card-header"> <a href="{{ route('products.show', $product->id)}}"> Product | {{$product->name}} </a> </div>
        <div class="card-body">

            <div class="card-body">

            <div class="col-md-6 float-left">
                <a href="{{ route('products.show', $product->id)}}">
                    <img class="rounded float-left" style="position: relative; width:100%;height:100%;" src='{{ $product->img_url }}' />
                </a>

                @foreach ($product->tags as $tag)
                    <a href="{{ route('tags.show', $tag->id)}}" class="badge badge-secondary">{{ $tag->tag_name }}</a>
                @endforeach
            </div>


            <div class="col-md-6 float-right">

                <span class="row">{{ $product->name }}</span>
                <br>
                <span class="row">{{ $product->description }}</span>
                <br>
                <span class="row">$ {{ $product->price }}</span>
                <br>
                <form id="add-to-cart-form-{$product->id}" action="{{route('carts.store')}}" method="post">
                    @csrf
                    <input name="item" type="text" value="{{ $product->id }}" hidden>
                    <span class="row">
                        <input type="number" name="quantity" {{ $product->quantity == 0? 'disabled' : '' }} value="1" min="1" max="{{ $product->quantity }}">
                    </span>
                    <br>
                </form>
                <span class="row">

                    <div class="btn-toolbar justify-content-between">

                        <div class="btn-group mr-2">
                            <button class="btn {{ $product->quantity <= 0? 'btn-outline-danger' : 'btn-outline-primary' }}"
                                {{ $product->quantity == 0? 'disabled' : '' }}
                                onclick="event.preventDefault();
                                                document.getElementById('add-to-cart-form-{$product->id}').submit();">
                                {{ $product->quantity == 0? 'OUT OF STOCK' : 'ADD TO CART' }}
                            </button>
                        </div>

                        @auth
                            @isowner($product)
                                <div class="btn-group mr-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary">EDIT</a>
                                </div>
                                <div class="btn-group mr-2">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                    </form>
                                </div>
                            @endisowner
                        @endauth
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<hr>
