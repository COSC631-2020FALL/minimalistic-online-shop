@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            @include('components.left-nav')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <div class="card-body">

                            <form action="{{ route('categories.create') }}" method="POST">

                                @csrf
                                @method('POST')

                                <div class="form-group row">

                                    <label for="review" class="col-md-4 col-form-label text-md-right">Category Name</label>
                                    <div class="col-md-6">
                                        <input name="name" required >
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
    </div>

@endsection
