@extends('layouts.app')

@section('content')

    @foreach ($products as $product)
        <p>This is a product {{ $product->name }}</p>
    @endforeach


@endsection
