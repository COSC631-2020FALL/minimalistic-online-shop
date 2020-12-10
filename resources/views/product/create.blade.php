@extends('layouts.app')

@section('content')


    {{--$user--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <input name ="owner_id" type="hidden" value="{{$user->id}}">

                            <div class="form-group row">
                                <label for="pname" class="col-md-4 col-form-label text-md-right">Product Name</label>
                                <div class="col-md-6">
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required>
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
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" required >{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img_url" class="col-md-4 col-form-label text-md-right">Image URL</label>
                                <div class="col-md-6">
                                    <input value="{{ old('img_url') }}" name="img_url" type="file" type="image/*" class="@error('img_url') is-invalid @enderror" required>
                                    @error('img_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                                <div class="col-md-6">
                                    <input value="{{ old('price') }}"  name="price" type="text" class="form-control @error('price') is-invalid @enderror" required>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>
                                    <div class="col-md-6">
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="tags" class="col-md-4 col-form-label text-md-right">Product Tags </label>
                                <div class="col-md-6">
                                    <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity In Stock</label>
                                    <div class="col-md-6">
                                        <input id="quantity" name="quantity"
                                               type="text" class="form-control @error('quantity') is-invalid @enderror"
                                               value="{{ old('quantity')}}" required>
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">CREATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
