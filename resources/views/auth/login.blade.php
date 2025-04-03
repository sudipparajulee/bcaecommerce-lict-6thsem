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
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <label for="remember" class="text-gray-700">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">Login</button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-gray-700">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a></p>
            </div>

        </div>
    </div>
</body>
</html>
