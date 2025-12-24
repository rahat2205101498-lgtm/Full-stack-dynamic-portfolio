@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold gradient-text">Dashboard</h1>
    <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your portfolio.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 mb-2">Total Projects</p>
                <p class="text-4xl font-bold">{{ $stats['projects'] }}</p>
                <p class="text-sm text-purple-100 mt-1">{{ $stats['active_projects'] }} active</p>
            </div>
            <div class="text-5xl opacity-50">🚀</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-blue-500 to-cyan-500 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 mb-2">Total Skills</p>
                <p class="text-4xl font-bold">{{ $stats['skills'] }}</p>
            </div>
            <div class="text-5xl opacity-50">💡</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-green-500 to-emerald-500 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 mb-2">Total Messages</p>
                <p class="text-4xl font-bold">{{ $stats['messages'] }}</p>
                <p class="text-sm text-green-100 mt-1">{{ $stats['unread_messages'] }} unread</p>
            </div>
            <div class="text-5xl opacity-50">✉️</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-orange-500 to-red-500 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 mb-2">Portfolio</p>
                <a href="{{ route('portfolio') }}" target="_blank" class="text-white hover:text-orange-100 font-semibold underline">View Live →</a>
            </div>
            <div class="text-5xl opacity-50">👁️</div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden">
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6">
        <h2 class="text-2xl font-bold text-white">Recent Messages</h2>
    </div>
    <div class="p-6">
        @forelse($recent_messages as $message)
            <div class="border-b border-gray-200 pb-4 mb-4 last:border-b-0 hover:bg-gray-50 p-4 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="font-bold text-gray-800">{{ $message->name }}</h3>
                            @if(!$message->is_read)
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full font-semibold">New</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-1">{{ $message->email }}</p>
                        <p class="text-gray-700 mt-2">{{ Str::limit($message->message, 100) }}</p>
                    </div>
                    <div class="text-right ml-4">
                        <span class="text-xs text-gray-500 block mb-2">{{ $message->created_at->diffForHumans() }}</span>
                        <a href="{{ route('admin.messages.show', $message) }}" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
                            View →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center py-8">No messages yet.</p>
        @endforelse
    </div>
</div>

<!-- Recent Projects -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-blue-600 to-cyan-600 p-6">
        <h2 class="text-2xl font-bold text-white">Recent Projects</h2>
    </div>
    <div class="p-6">
        @forelse($recent_projects as $project)
            <div class="border-b border-gray-200 pb-4 mb-4 last:border-b-0 hover:bg-gray-50 p-4 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="font-bold text-gray-800">{{ $project->title }}</h3>
                            <span class="px-3 py-1 text-xs rounded-full font-semibold {{ $project->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $project->is_active ? '✓ Active' : '○ Inactive' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="ml-4 inline-block bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
                        Edit →
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center py-8">No projects yet.</p>
        @endforelse
    </div>
</div>
@endsection
