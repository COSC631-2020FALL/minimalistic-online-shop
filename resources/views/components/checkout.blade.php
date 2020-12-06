<form action="{{ route('checkout') }}">
    <span class="row"><p>Payment Methods:</p></span>

    <span class="form-group row">
        <input type="radio" checked name="paypal"> Paypal
    </span>

    <span class="form-group row">
        Total Cost: $ {{ $total?? 0 }}
    </span>

    <div class="form-group row">
        <button name="review" type="submit" class="btn btn-primary">PROCEED CHECKOUT</button>
    </div>
</form>
