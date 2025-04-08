@extends('layouts.master')
@section('content')
    <div class="px-24 py-10">
        <h1 class="font-bold text-3xl">My Cart</h1>
        <div class="grid grid-cols-1 gap-5">
            @foreach ($carts as $cart)
                <div class="shadow-lg p-4 flex justify-between items-center border rounded-lg">
                    <div class="flex gap-4">
                        <img src="{{asset('images/products/'.$cart->product->photopath)}}" alt="" class="h-32 w-32 object-cover">
                        <div>
                            <h1 class="font-bold text-xl">{{$cart->product->name}}</h1>
                            <p class="text-gray-500">
                                @if($cart->product->discounted_price)
                                    <span class="text-red-600 font-bold text-lg">
                                        Rs. {{$cart->product->discounted_price}}
                                    </span>
                                    <span class="text-gray-500 line-through">
                                        Rs. {{$cart->product->price}}
                                    </span>
                                @else
                                    <span class="text-red-600 font-bold text-lg">
                                        Rs. {{$cart->product->price}}
                                    </span>
                                @endif
                            <p class="text-gray-500">Quantity: {{$cart->quantity}}</p>
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <a href="" class="bg-blue-600 block text-center text-white px-4 py-2 rounded-lg">Order Now</a>
                        <form action="" method="POST" class="block">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-8 py-2 rounded-lg">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
