<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @php
        $categories = \App\Models\Category::orderBy('priority')->get();
    @endphp
    <div class="bg-blue-600 text-white flex justify-between px-12 py-1">
        <div class="flex gap-2">
            <p>PHone</p>
            <p>Address</p>
            <p>Email</p>
        </div>
        <div>
            @auth
                <div class="flex gap-2">
                    Hi, {{auth()->user()->name}}
                    <form action="{{route('logout')}}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                </div>
            @else
                <a href="{{route('login')}}">Login</a>
            @endauth
        </div>
    </div>


    <nav class="bg-white shadow px-12 flex justify-between py-4 sticky top-0">
        <h1 class="font-bold text-xl">LOGO</h1>
        <ul class="flex gap-4">
            <li><a href="{{route('home')}}">Home</a></li>
            @foreach($categories as $category)
                <li><a href="{{route('categoryproduct',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </nav>
    @yield('content')
    <footer class="bg-blue-800 text-white py-4 text-center">
        <p>&copy; 2025 My Site</p>
    </footer>
</body>
</html>
