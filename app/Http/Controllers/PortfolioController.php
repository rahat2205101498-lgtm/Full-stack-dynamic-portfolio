<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio page.
     */
    public function index()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        $skills = Skill::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Get admin user profile (first user with profile image, or first user)
        $user = User::whereNotNull('profile_image')
            ->where('profile_image', '!=', '')
            ->first() ?? User::first();
        
        // Debug: Check if user has profile image
        if ($user && $user->profile_image) {
            // Verify image exists
            if (!Storage::disk('public')->exists($user->profile_image)) {
                // Image path exists in DB but file doesn't exist
                \Log::warning('Profile image not found: ' . $user->profile_image);
            }
        }

        return view('portfolio', [
            'projects' => $projects,
            'skills' => $skills,
            'user' => $user,
        ]);
    }

    /**
     * Handle contact form submission.
     */
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}

