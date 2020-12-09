@extends('layouts.app')

@section('top_scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AcJNacE8a8nEFfL84_3-QlxMza8GWpucPD3xKbm_VlcfbzcRNR0-8aL_aEEmpynzz-ObnEzAWTJMohea"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>

    <script>
        paypal.Buttons(
            {
                createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: {{ \Cart::getTotal() }}
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    alert('Transaction completed by ' + details.payer.name.given_name);

                });
                }
            }
        ).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>
@endsection

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Checkout</div>

                    <div class="card-body text-center">
                        {{--  <button class="btn btn-outline-primary">CONFIRM CHECKOUT</button>  --}}

                        <div id="paypal-button-container"></div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
