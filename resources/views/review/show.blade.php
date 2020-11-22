@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Review | for | {{$review->for_product['name']}}</div>

                    <div class="card-body">
                       <table>
                            <tr>
                                <th>Review From</th>
                                <th>Review For</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Edit Entry</th>
                            </tr>
                            <tr>
                                <td>{{ $review->review_owner->name }}</td>
                                <td>{{ $review->for_product['name'] }}</td>
                                <td>{{ $review->rating}}</td>
                                <td>{{ $review->review}}</td>
                                <td>
                                @if(true)
                                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary float-right">EDIT</a>
                                @endif
                                </td>
                            </tr>
                       </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
