@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registered Users</div>

                    <div class="card-body">
                       <table>

                            @foreach ($users as $user)
                                <p>This is user {{ $user->name }}</p>
                            @endforeach

                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
