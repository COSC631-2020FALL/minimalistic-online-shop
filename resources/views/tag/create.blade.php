@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Tag</div>

                    <div class="card-body">
                        <form action="{{ route('tags.store') }}" method="POST">

                            @csrf

                            <div class="form-group row">
                                <label for="tag_name" class="col-md-4 col-form-label text-md-right">Tag Name</label>

                                <div class="col-md-6">
                                    <input id="tag_name" type="name"
                                    class="form-control @error('tag_name') is-invalid @enderror"
                                    name="tag_name" required>

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
