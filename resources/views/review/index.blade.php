@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                @include('components.alert')
                <div class="card">
                    <div class="card-header">
                        <span>Reviews</span>
                        <a href="{{ route('reviews.create') }}" class="btn btn-primary float-right">CREATE REVIEW</a>
                    </div>

                    <div class="card-body">
                       <table>

                            <tr>
                                <th>Review From</th>
                                <th>Review For</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Edit Entry</th>
                            </tr>

                            @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->review_owner->name }}</td>
                                <td>{{ $review->for_product->name }}</td>
                                <td>{{ $review->rating}}</td>
                                <td>{{ $review->review}}</td>
                                <td>
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" >DELETE</button>
                                    </form>
                                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary float-right">EDIT</a>
                                </td>
                            </tr>
                            @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
