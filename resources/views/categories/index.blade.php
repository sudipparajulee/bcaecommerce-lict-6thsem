@extends('layouts.app')
@section('title', 'Categories')
@section('content')

    <div class="flex justify-end my-5">
        <a href="{{route('category.create')}}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-2 rounded-lg">Add Category</a>
    </div>

    <table class="w-full">
        <tr class="bg-blue-500 text-white">
            <th class="p-2 border">Order</th>
            <th class="p-2 border">Category Name</th>
            <th class="p-2 border">Action</th>
        </tr>
        <tr class="text-center">
            <td class="p-2 border">1</td>
            <td class="p-2 border">Category 1</td>
            <td class="p-2 border">
                <a href="" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Edit</a>
                <a href="" class="bg-red-500 text-white px-2 py-1.5 rounded-lg">Delete</a>
            </td>
        </tr>
        <tr class="text-center">
            <td class="p-2 border">1</td>
            <td class="p-2 border">Category 1</td>
            <td class="p-2 border">
                <a href="" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Edit</a>
                <a href="" class="bg-red-500 text-white px-2 py-1.5 rounded-lg">Delete</a>
            </td>
        </tr>
    </table>
@endsection
