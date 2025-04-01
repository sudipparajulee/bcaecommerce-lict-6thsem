<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.alert')
        <div class="flex">
            <div class="w-56 h-screen bg-gray-100 shadow-lg border border-gray-200">
                <img src="https://picsum.photos/500" alt="" class="w-1/2 mx-auto py-5">
                <div class="mt-4 grid">
                    <a href="{{route('dashboard')}}" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Dashboard</a>
                    <a href="{{route('category.index')}}" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Categories</a>
                    <a href="{{route('product.index')}}" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Products</a>
                    <a href="" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Orders</a>
                    <a href="" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Users</a>
                    <a href="" class="text-xl font-bold p-4 border-b hover:bg-gray-300">Logout</a>
                </div>
            </div>
            <div class="p-4 flex-1">
                <h2 class="text-3xl font-bold">@yield('title')</h2>
                <hr class="h-1 bg-red-600">
                <div class="mt-4">
                    @yield('content')
                </div>
            </div>
        </div>


    </body>
</html>
