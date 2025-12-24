<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portfolio Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Admin Login</h1>
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-gray-800 focus:border-gray-800">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-gray-800 focus:border-gray-800">
                </div>
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-gray-800 focus:ring-gray-800">
                        <span class="ml-2 text-sm text-gray-700">Remember me</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Login
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Back to Portfolio</a>
        </div>
    </div>
</body>
</html>

