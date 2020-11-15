@extends('layouts.app')

@section('content')


     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User | {{$user->name}}</div>

                    <div class="card-body">



                          {{--  TODO: Implement form  --}}

                        <form action="user.update" method="PUT">
                            {{ $user }}
                            <button class="btn btn-primary" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
