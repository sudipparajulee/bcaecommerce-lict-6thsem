@extends('layouts.master')
@section('content')

    <div class="px-24 py-10 grid grid-cols-2 gap-5">
        <div>
            <h1 class="font-bold text-3xl mb-5">Checkout</h1>
            <div class="shadow-lg p-4 grid gap-6 justify-between items-center border rounded-lg">
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
                        </p>
                        <p class="text-gray-500">Quantity: {{$cart->quantity}}</p>
                    </div>
                </div>
                <div class="grid gap-4">
                    {{-- Esewa here  --}}
                </div>
            </div>
        </div>
    </div>

@endsection
