<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'projects' => Project::count(),
            'active_projects' => Project::where('is_active', true)->count(),
            'skills' => Skill::count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recent_messages = ContactMessage::latest()->take(5)->get();
        $recent_projects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages', 'recent_projects'));
    }
}
