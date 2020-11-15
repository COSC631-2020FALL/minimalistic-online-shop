@extends('layouts.app')

@section('content')

    {{--  TODO: Implement form  --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User</div>

                    <div class="card-body">

                          {{--  TODO: Implement form  --}}
                        <form action="users.store" method="POST">


                            <button class="btn btn-primary" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
