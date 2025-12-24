@extends('admin.layout')

@section('title', 'Edit Profile')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold gradient-text">Edit Profile</h1>
    <p class="text-gray-600 mt-2">Update your account information and profile image</p>
</div>

<div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <!-- Profile Image Section -->
            <div class="border-b-2 border-gray-200 pb-6">
                <label class="block text-sm font-bold text-gray-700 mb-4 uppercase tracking-wide">Profile Image</label>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        @php
                            use Illuminate\Support\Facades\Storage;
                            $hasImage = false;
                            $currentImageUrl = null;
                            
                            if ($user->profile_image) {
                                $imagePath = trim($user->profile_image);
                                if (Storage::disk('public')->exists($imagePath)) {
                                    $hasImage = true;
                                    $currentImageUrl = Storage::url($imagePath);
                                } elseif (file_exists(public_path('storage/' . $imagePath))) {
                                    $hasImage = true;
                                    $currentImageUrl = asset('storage/' . $imagePath);
                                }
                            }
                        @endphp
                        @if($hasImage && $currentImageUrl)
                            <img id="profilePreview" src="{{ $currentImageUrl }}" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-purple-200 shadow-lg" onerror="this.onerror=null; this.style.display='none'; document.getElementById('profilePlaceholder').classList.remove('hidden');">
                            <div id="profilePlaceholder" class="w-32 h-32 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white text-4xl font-bold border-4 border-purple-200 shadow-lg hidden">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @else
                            <img id="profilePreview" src="" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-purple-200 shadow-lg hidden">
                            <div id="profilePlaceholder" class="w-32 h-32 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white text-4xl font-bold border-4 border-purple-200 shadow-lg">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 bg-purple-600 text-white rounded-full p-2 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <input 
                            type="file" 
                            name="profile_image" 
                            id="profileImageInput"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-purple-600 file:to-pink-600 file:text-white hover:file:shadow-lg transition-all cursor-pointer"
                        >
                        <p class="text-xs text-gray-500 mt-2">Recommended: Square image, max 2MB (JPEG, PNG, JPG, GIF)</p>
                        @if($hasImage)
                            <p class="text-xs text-green-600 mt-1">Current image: {{ basename($user->profile_image) }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $user->name) }}" 
                    required
                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                    placeholder="Your Name"
                >
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    required
                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                    placeholder="your.email@example.com"
                >
            </div>

            <!-- Password Section -->
            <div class="border-t-2 border-gray-200 pt-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Change Password</h3>
                <p class="text-sm text-gray-600 mb-4">Leave blank if you don't want to change password</p>
                
                <!-- Current Password -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Current Password</label>
                    <input 
                        type="password" 
                        name="current_password" 
                        class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        placeholder="Enter current password"
                    >
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">New Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        placeholder="Enter new password"
                    >
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                        placeholder="Confirm new password"
                    >
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex space-x-4 pt-4">
                <button 
                    type="submit"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-xl font-bold hover:shadow-lg transition-all transform hover:scale-105"
                >
                    Update Profile
                </button>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="bg-gray-200 text-gray-800 px-8 py-4 rounded-xl font-bold hover:bg-gray-300 transition-all"
                >
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>

<script>
    // Preview image before upload
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
                document.getElementById('profilePreview').classList.remove('hidden');
                document.getElementById('profilePlaceholder').classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
