@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Product | {{$product->name}}</div>
               <div class="card-body">
                          <!-- $product-->
                  <div class="card-body">
                     <table>
                        <tr>
                            <th>ProductName</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Price</th>
                            <th>Seller</th>
                            <th>Tags</th>
                            <th>Delete/Edit</th>
                        </tr>
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img style="width:8em;height:8em;" src='{{ $product->img_url }}' /></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->owner_id }}</td>
                            <td>
                            @foreach ($product->tags as $tag)
                                <a href="{{ route('tags.show',$tag->id)}}">{{ $tag->tag_name}}<a>
                            @endforeach
                            </td>
                            <td>
                                <form action="{{route('products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary float-right">EDIT</a>
                            </td>
                        </tr>
                     </table>
                  </div>
                  @foreach ($reviews as $review)
                  <div class="card-body">
                     {{$review}}
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
   </div>
</div>

@endsection
