@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                @include('components.alert')
                <div class="card">
                    <div class="card-header">
                        <span>Registered Users</span>
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">CREATE USER</a>
                    </div>

                    <div class="card-body">

                        <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">

                                <div class="row">
                                    <div class="col-md-9">
                                        <span class="float-left">
                                            <a href="{{ route('users.show', $user->id )}}"> {{ $user->name}}  </a>
                                        </span>
                                    </div>


                                    <div class="col-md-3">

                                        <form name="form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  {{ Auth::user()->id == $user->id || $user->is_admin ? 'disabled' : '' }} type="submit" class="float-right btn btn-danger" >DELETE</button>
                                        </form>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary float-left">EDIT</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
