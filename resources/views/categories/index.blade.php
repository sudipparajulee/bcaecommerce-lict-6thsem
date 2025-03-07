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
        @foreach($categories as $category)
        <tr class="text-center">
            <td class="p-2 border">{{$category->priority}}</td>
            <td class="p-2 border">{{$category->name}}</td>
            <td class="p-2 border">
                <a href="{{route('category.edit',$category->id)}}" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Edit</a>
                <a onclick="showPopup('{{$category->id}}')" class="bg-red-500 text-white px-2 py-1.5 rounded-lg cursor-pointer">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

    <div id="popup" class="fixed inset-0 bg-gray-600 bg-opacity-60 backdrop-blur-sm hidden items-center justify-center">
        <div class="bg-white p-4 rounded-lg w-64">
            <h2 class="text-center text-xl font-bold">Are you sure?</h2>
            <form action="{{route('category.destroy')}}" method="POST">
                @csrf
                <input type="hidden" name="id" id="deleteid">
                <div class="flex justify-center mt-2">
                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg">Delete</button>
                    <a onclick="hidePopup()" class="bg-blue-500 text-white px-3 py-2 rounded-lg ml-2 cursor-pointer">Cancel</a>

                </div>
            </form>
        </div>
    </div>

    <script>
        function showPopup(a){
            document.getElementById('deleteid').value = a;
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
        }

        function hidePopup(){
            document.getElementById('popup').classList.remove('flex');
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
@endsection
