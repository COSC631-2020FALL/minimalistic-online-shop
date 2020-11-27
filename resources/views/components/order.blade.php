<blockquote class="blockquote mb-0">
    <p> <a href="{{ route('orders.show',$order->id)}}">Order #{{ $order->id }}</a> </p>
    <footer class="blockquote-footer">Ordered on <cite title="Source Title">{{ $order->created_at }}</cite></footer>
    <hr>
</blockquote>
