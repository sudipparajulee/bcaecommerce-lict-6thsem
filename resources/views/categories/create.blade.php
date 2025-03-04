@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <input type="text" name="priority" placeholder="Priority" class="border p-2 rounded-lg w-full my-2">
        <input type="text" name="name" placeholder="Category Name" class="border p-2 rounded-lg w-full my-2">
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-lg mt-2">Add Category</button>
            <a href="{{route('category.index')}}" class="bg-red-500 text-white px-3 py-2 rounded-lg mt-2 ml-2">Cancel</a>
        </div>
    </form>
@endsection
