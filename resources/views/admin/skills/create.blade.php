@extends('admin.layout')

@section('title', 'Create Skill')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Create New Skill</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-gray-800 focus:border-gray-800">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-gray-800 focus:border-gray-800">
            </div>
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-gray-800 focus:ring-gray-800">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
            <div class="flex space-x-4">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-700">
                    Create Skill
                </button>
                <a href="{{ route('admin.skills.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

