<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Portfolio Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-link {
            transition: all 0.3s ease;
        }
        .sidebar-link:hover {
            transform: translateX(5px);
            background: linear-gradient(90deg, rgba(139, 92, 246, 0.2), transparent);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 gradient-bg text-white min-h-screen shadow-2xl">
            <div class="p-6">
                <div class="mb-8">
                    <div class="flex items-center space-x-3 mb-4">
                        @auth
                            @if(Auth::user()->profile_image && Storage::disk('public')->exists(Auth::user()->profile_image))
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" class="w-12 h-12 rounded-full object-cover border-2 border-white/30" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white text-lg font-bold border-2 border-white/30" style="display: none;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @else
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center text-white text-lg font-bold border-2 border-white/30">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-white/70">{{ Auth::user()->email }}</p>
                            </div>
                        @endauth
                    </div>
                    <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-purple-200">Portfolio Admin</h1>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 backdrop-blur-md shadow-lg' : 'hover:bg-white/10' }}">
                        <span class="mr-3">📊</span>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.projects.*') ? 'bg-white/20 backdrop-blur-md shadow-lg' : 'hover:bg-white/10' }}">
                        <span class="mr-3">🚀</span>
                        Projects
                    </a>
                    <a href="{{ route('admin.skills.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.skills.*') ? 'bg-white/20 backdrop-blur-md shadow-lg' : 'hover:bg-white/10' }}">
                        <span class="mr-3">💡</span>
                        Skills
                    </a>
                    <a href="{{ route('admin.messages.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.messages.*') ? 'bg-white/20 backdrop-blur-md shadow-lg' : 'hover:bg-white/10' }}">
                        <span class="mr-3">✉️</span>
                        Messages
                    </a>
                    <a href="{{ route('admin.profile.edit') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.profile.*') ? 'bg-white/20 backdrop-blur-md shadow-lg' : 'hover:bg-white/10' }}">
                        <span class="mr-3">👤</span>
                        Profile
                    </a>
                    <a href="{{ route('portfolio') }}" target="_blank" class="sidebar-link flex items-center px-4 py-3 rounded-lg hover:bg-white/10">
                        <span class="mr-3">👁️</span>
                        View Portfolio
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="sidebar-link flex items-center w-full text-left px-4 py-3 rounded-lg hover:bg-red-600/30 transition-colors">
                            <span class="mr-3">🚪</span>
                            Logout
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg animate-fade-in-up">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
