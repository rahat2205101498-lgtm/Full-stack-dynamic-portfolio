@extends('admin.layout')

@section('title', 'View Message')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Message Details</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
            <p class="text-gray-900 font-semibold">{{ $message->name }}</p>
            <p class="text-gray-600">{{ $message->email }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <p class="text-gray-600">{{ $message->created_at->format('F d, Y \a\t h:i A') }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <p class="text-gray-900 whitespace-pre-wrap">{{ $message->message }}</p>
        </div>
        <div class="flex space-x-4 pt-4">
            <a href="{{ route('admin.messages.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
                Back to Messages
            </a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

