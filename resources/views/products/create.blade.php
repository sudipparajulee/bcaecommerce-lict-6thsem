@extends('layouts.app')
@section('title','Create Product')
@section('content')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="border p-2 rounded-lg w-full mt-2">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <select name="brand_id" id="" class="border p-2 rounded-lg w-full mt-2">
        @foreach($brands as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select>

    <input type="text" name="name" placeholder="Product Name" class="border p-2 rounded-lg w-full mt-2" value="{{old('name')}}">
    @error('name')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <textarea name="description" placeholder="Enter Description" class="border p-2 rounded-lg w-full mt-2" rows="5">{{old('description')}}</textarea>
    @error('description')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="price" placeholder="Price" class="border p-2 rounded-lg w-full mt-2" value="{{old('price')}}">
    @error('price')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="discounted_price" placeholder="Enter Discounted Price" class="border p-2 rounded-lg w-full mt-2" value="{{old('discounted_price')}}">
    @error('discounted_price')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="stock" placeholder="Stock" class="border p-2 rounded-lg w-full mt-2" value="{{old('stock')}}">
    @error('stock')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="file" name="photopath" class="border p-2 rounded-lg w-full mt-2">
    @error('photopath')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-lg mt-2">Add Product</button>
        <a href="{{route('product.index')}}" class="bg-red-500 text-white px-3 py-2 rounded-lg mt-2 ml-2">Cancel</a>
    </div>
</form>
@endsection
