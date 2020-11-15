@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registered Users</div>

                    <div class="card-body">
                       <table>

                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->address_1}}</td>
                                <td>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">DELETE</button>
                                    </form>

                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary pull-right">EDIT</a>

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
