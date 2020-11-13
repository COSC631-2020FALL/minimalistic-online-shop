@extends('layouts.app')

@section('content')

    @foreach ($users as $user)
        <p>This is user {{ $user->name }}</p>
    @endforeach


@endsection
