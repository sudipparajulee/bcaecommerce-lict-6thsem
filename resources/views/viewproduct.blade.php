@extends('layouts.master')
@section('content')
    <div class="py-10 px-20 bg-gray-100">

        <div class="grid grid-cols-4 gap-5 mt-5">
            <div class="shadow-md p-2 border">
                <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full object-cover">
            </div>
            <div class="col-span-2">
                <h1 class="text-xl font-bold">{{$product->name}}</h1>
                @if($product->discounted_price > 0)
                <p class="text-lg font-bold">Rs. {{$product->discounted_price}} <span class="line-through font-normal text-sm">Rs. {{$product->price}}</span> </p>
                @else
                <p class="text-lg font-bold">Rs. {{$product->price}}</p>
                @endif

                <p class="text-md text-red-600">Stock: {{$product->stock}}</p>

                {{-- Increment and Decrement  --}}
                <div class="flex items-center mt-5">
                    <button class="bg-gray-200 px-3 py-2 rounded-l-lg" onclick="decrement()">-</button>
                    <input type="text" value="1" class=" border-none text-center w-12" id="qty" readonly>
                    <button class="bg-gray-200 px-3 py-2 rounded-r-lg" onclick="increment()">+</button>
                </div>

                <div class="flex justify-between mt-5">
                    <button class="bg-blue-500 text-white px-3 py-2 rounded-lg">Add to Cart</button>
                </div>
            </div>
            <div class="border-l border-gray-300 pl-4">
                <p>Easy Delivery</p>
                <p>Cash on Delivery</p>
                <p>Free Returns</p>
            </div>
        </div>

        <div class="mt-10">
            <h1 class="text-2xl font-bold">Description</h1>
            <p class="text-md mt-2">{!! $product->description !!}</p>
        </div>

    </div>

    <div class="py-10 px-20 bg-gray-100">
        <h1 class="text-xl font-bold">Related Products</h1>

        <div class="grid grid-cols-4 gap-5 mt-5">
            @foreach($relatedproducts as $product)
            <a href="{{route('viewproduct',$product->id)}}" class="shadow-md p-2 border">
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

    <script>
        function increment()
        {
            if(document.getElementById('qty').value < {{$product->stock}}){
                document.getElementById('qty').value++;
            }
        }

        function decrement()
        {
            if(document.getElementById('qty').value > 1){
                document.getElementById('qty').value--;
            }
        }
    </script>

@endsection
