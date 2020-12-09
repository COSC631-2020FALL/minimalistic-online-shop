@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
            @include('components.alert')
                <div class="card">
                    <div class="card-header">
                        <span>All tags</span>
                        <a href="{{ route('tags.create') }}" class="btn btn-primary float-right">CREATE TAG</a>
                    </div>
                    <div class="card-body">


                        <ul class="list-group">
                        @foreach ($tags as $tag)
                            <li class="list-group-item">

                                <div class="row">
                                    <div class="col-md-9">
                                        <span class="float-left">
                                            <a href="{{ route('tags.show', $tag->id )}}"> {{ $tag->tag_name}}  </a>
                                        </span>
                                    </div>


                                    <div class="col-md-3">

                                        <form name="form-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-right btn btn-danger" >DELETE</button>
                                        </form>
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary float-left">EDIT</a>
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
