@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{$product->name}}</div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id ) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <input name ="owner_id" type="hidden" value="{{$user->id}}">

                                <div class="form-group row">
                                    <label for="pname" class="col-md-4 col-form-label text-md-right">Product Name</label>

                                    <div class="col-md-6">
                                        <input id="pname" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ $product->name}}" required>
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
                                        <!--input id="pdesc" type="textarea" class="form-control"  value="{{ $product->description}}" required-->
                                        <textarea id="pdesc" name="description" class="form-control @error('description') is-invalid @enderror"  value="{{ $product->description}}" required >{{ $product->description}}</textarea>
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
                                        <input name="img_url" type="file" accept="image/*" class="@error('img_url') is-invalid @enderror">
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
                                        <input id="pprice" name="price" type="text" class="form-control @error('price') is-invalid @enderror"  value="{{ $product->price}}" required>
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
                                                <option
                                                    @if($category->id == $product->category_id)
                                                    selected="selected"
                                                    @endif
                                                value="{{$category->id}}">{{$category->name}}</option>
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
                                               value="{{ $product->quantity}}" required>
                                        @error('quantity')
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

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
