@extends('layouts.app')
@section('title', 'Orders')
@section('content')

    <table class="w-full">
        <tr class="bg-blue-500 text-white">
            <th class="p-2 border">Order Date</th>
            <th class="p-2 border">Picture</th>
            <th class="p-2 border">Product Name</th>
            <th class="p-2 border">Customer Name</th>
            <th class="p-2 border">Address</th>
            <th class="p-2 border">Phone</th>
            <th class="p-2 border">Quantity</th>
            <th class="p-2 border">Rate</th>
            <th class="p-2 border">Total</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Action</th>
        </tr>
        @foreach($orders as $order)
        <tr class="text-center">
            <td class="p-2 border">{{$order->created_at}}</td>
            <td class="p-2 border">
                <img src="{{asset('images/products/'.$order->product->photopath)}}" alt="" class="h-20">
            </td>
            <td class="p-2 border">{{$order->product->name}}</td>
            <td class="p-2 border">{{$order->name}}</td>
            <td class="p-2 border">{{$order->address}}</td>
            <td class="p-2 border">{{$order->phone}}</td>
            <td class="p-2 border">{{$order->quantity}}</td>
            <td class="p-2 border">{{$order->price}}</td>
            <td class="p-2 border">{{$order->price * $order->quantity}}</td>
            <td class="p-2 border">{{$order->status}}</td>
            <td class="p-2 border grid gap-2">
                <a href="{{route('order.status',[$order->id,'Pending'])}}" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Pending</a>
                <a href="{{route('order.status',[$order->id,'Processing'])}}" class="bg-yellow-500 text-white px-3 py-1.5 rounded-lg">Processing</a>
                <a href="{{route('order.status',[$order->id,'Delivered'])}}" class="bg-green-500 text-white px-3 py-1.5 rounded-lg">Delivered</a>
                <a href="{{route('order.status',[$order->id,'Rejected'])}}" class="bg-red-500 text-white px-3 py-1.5 rounded-lg">Rejected</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
