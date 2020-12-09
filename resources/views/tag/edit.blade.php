@extends('layouts.app')

@section('content')


     <div class="container">
        <div class="row justify-content-center">

            @include('components.left-nav')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Tag | {{$tag->tag_name}}</div>

                    <div class="card-body">
                        <form action="{{ "/tags/{$tag->id}" }}" method="post">

                            @csrf
                            @method("PUT")

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Tag Name</label>

                                <div class="col-md-6">
                                    <input id="tag_name" type="name"
                                        class="form-control @error('tag_name') is-invalid @enderror"
                                        name="tag_name" required value="{{ $tag->tag_name }}">
                                    @error('tag_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
