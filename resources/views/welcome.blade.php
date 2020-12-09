@extends('layouts.app')
@section('content')
    <body>
        <div class="container">
            <div >
                <img src="{{asset('image/landing.jpg')}}" class="img-fluid" alt="100%x250" style="height:100%; width: 100%; display: block;" >
            </div>



            @foreach(App\Category::with(['products'])->has('products')->get() as $category)
            
                <div class="col-md-12 mb-5 mt-5">
                    <div class="h2 text-center">{{ $category->name }}</div>
                </div>

                <section class="col-md-12">
                    <div class="row">
                        @foreach($category->products as $product)
                            <div class="col-md-6">
                                    @include('components.product')
                            </div>
                        @endforeach

                    </div>
                </section>

            @endforeach

        </div>
    </body>
@endsection
