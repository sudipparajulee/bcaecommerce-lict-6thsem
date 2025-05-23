@extends('layouts.app')
@section('title','Edit Product')
@section('content')
<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="border p-2 rounded-lg w-full mt-2">
        @foreach($categories as $category)
        <option value="{{$category->id}}"
            @if($category->id == $product->category_id)
                selected
            @endif
            >{{$category->name}}</option>
        @endforeach
    </select>

    <select name="brand_id" id="" class="border p-2 rounded-lg w-full mt-2">
        @foreach($brands as $brand)
        <option value="{{$brand->id}}"
            @if($brand->id == $product->brand_id)
                selected
            @endif
            >{{$brand->name}}</option>
        @endforeach
    </select>

    <input type="text" name="name" placeholder="Product Name" class="border p-2 rounded-lg w-full mt-2" value="{{$product->name}}">
    @error('name')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <textarea name="description" placeholder="Enter Description" class="border p-2 rounded-lg w-full mt-2" rows="5">{{$product->description}}</textarea>
    @error('description')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="price" placeholder="Price" class="border p-2 rounded-lg w-full mt-2" value="{{$product->price}}">
    @error('price')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="discounted_price" placeholder="Enter Discounted Price" class="border p-2 rounded-lg w-full mt-2" value="{{$product->discounted_price}}">
    @error('discounted_price')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <input type="text" name="stock" placeholder="Stock" class="border p-2 rounded-lg w-full mt-2" value="{{$product->stock}}">
    @error('stock')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <p class="mt-5">Current Image</p>
    <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-44">

    <input type="file" name="photopath" class="border p-2 rounded-lg w-full mt-2">
    @error('photopath')
        <p class="text-red-500">* {{$message}}</p>
    @enderror

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-lg mt-2">Update Product</button>
        <a href="{{route('product.index')}}" class="bg-red-500 text-white px-3 py-2 rounded-lg mt-2 ml-2">Cancel</a>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
    selector: 'textarea',
    plugins: 'lists link image preview code',
    });
  </script>
@endsection
