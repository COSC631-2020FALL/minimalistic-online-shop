@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                       <table>
                        <tr>
                            <th>ProductName</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Price</th>
                            <th>Seller</th>
                            <th>Tags</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img style="width:8em;height:8em;" src='{{ $product->img_url }}' /></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->owner_id }}</td>
                            <td>{{ $product->tag_id }}</td>
                        </tr>
                        @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
