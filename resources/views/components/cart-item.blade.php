{{-- {{ var_dump($product->associatedModel->id) }} --}}
<div class="row">
    <div class="col-md-6">
        <img class="img-fluid" src="{{ $product->associatedModel->img_url }}" alt="">
    </div>
    <div class="col-md-6">
        <span class="form-group row">Name: {{ $product->associatedModel->name }}</span>

        <span class="form-group row">Quantity: {{ $product['quantity']}}</span>

        <span class="form-group row">Cost: $ {{ $product['quantity'] * $product['price'] }}</span>

        <span class="form-group row">
            <form action="{{ route('carts.destroy', $product->associatedModel->id )}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    REMOVE ITEM
                </button>
            </form>
        </span>
    </div>
</div>
<hr>
