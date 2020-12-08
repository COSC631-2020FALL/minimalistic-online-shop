@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            @if($user==null)
                                <label for="owner_id" class="col-md-4 col-form-label text-md-right">User :</label>
                                <select id="owner_id" name="owner_id">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input name ="owner_id" type="hidden" value="{{$user->id}}"></input>
                            @endif
                            <div class="form-group row">
                                <label for="pname" class="col-md-4 col-form-label text-md-right">Product Name</label>
                                <div class="col-md-6">
                                    <input id="pname" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pdesc" class="col-md-4 col-form-label text-md-right">Product Description</label>
                                <div class="col-md-6">
                                    <textarea id="pdesc" name="description" class="form-control @error('description') is-invalid @enderror" required ></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pimg" class="col-md-4 col-form-label text-md-right">Image URL</label>
                                <div class="col-md-6">
                                    <input id="pimg" name="img_url" type="text" class="form-control @error('img_url') is-invalid @enderror" required>
                                    @error('img_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pprice" class="col-md-4 col-form-label text-md-right">Price</label>
                                <div class="col-md-6">
                                    <input id="pprice" name="price" type="text" class="form-control @error('price') is-invalid @enderror" required>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
