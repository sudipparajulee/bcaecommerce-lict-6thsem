@extends('layouts.master')
@section('content')
    <div class="py-10 px-20 bg-gray-100">
        <h1 class="text-4xl font-bold">Latest Products</h1>

        <div class="grid grid-cols-4 gap-5 mt-5">
            @foreach($latestproducts as $product)
            <a href="" class="shadow-md p-2 border">
                <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full h-52 object-cover">
                <div class="mt-2">
                    <h1 class="text-xl font-bold">{{$product->name}}</h1>
                    @if($product->discounted_price > 0)
                    <p class="text-md font-bold">Rs. {{$product->discounted_price}} <span class="line-through font-normal text-sm">Rs. {{$product->price}}</span> </p>
                    @else
                    <p class="text-md font-bold">Rs. {{$product->price}}</p>
                    @endif
                </div>
            </a>
            @endforeach

        </div>

    </div>
@endsection
