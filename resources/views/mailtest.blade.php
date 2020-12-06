@extends('layouts.app')
@section('content')
<div>
test
    <form action="{{ route('mailtest' ) }}" method="POST">

    @csrf

        <input type='text'>{{$text}}</input>
        <input type="submit">TEST</input>
    </form>
</div>
@endsection