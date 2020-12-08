@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User</div>

                    <div class="card-body">

                          {{--  TODO: Implement form  --}}
                        <form action="{{ route('users.store') }}" method="POST">

                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="name"
                                    {{--  class="form-control @error('email') is-invalid @enderror"  --}}
                                    name="name" required>

                                    {{--  @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"

                                    name="email" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address_1" class="col-md-4 col-form-label text-md-right">Address 1</label>

                                <div class="col-md-6">
                                    <textarea id="address_1" name="address_1" required type="text"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_2" class="col-md-4 col-form-label text-md-right">Address 2</label>

                                <div class="col-md-6">
                                    <textarea id="address_2" name="address_2" required type="text"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
