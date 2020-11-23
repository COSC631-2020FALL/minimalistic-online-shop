@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>All tags</span>
                        <a href="{{ route('tags.create') }}" class="btn btn-primary float-right">CREATE TAG</a>
                    </div>
                    <div class="card-body">
                       <table>
                            <tr>
                                <th>Tag</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($tags as $tag)
                            <tr>
                                <p hidden>{{$tag->id}}<p> 
                                <td> <a href="{{ route('tags.show', $tag->id )}}"> {{ $tag->tag_name}}  </a></td>
                                <td>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >DELETE</button>
                                    </form>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary float-right">EDIT</a>
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
