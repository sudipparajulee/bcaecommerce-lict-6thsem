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
    <nav class="bg-white shadow px-12 flex justify-between py-4">
        <h1 class="font-bold text-xl">LOGO</h1>
        <ul class="flex gap-4">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav>
    @yield('content')
    <footer class="bg-blue-800 text-white py-4 text-center">
        <p>&copy; 2025 My Site</p>
    </footer>
</body>
</html>
