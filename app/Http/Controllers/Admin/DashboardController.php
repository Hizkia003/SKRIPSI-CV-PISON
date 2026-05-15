<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Certificate;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'certificates' => Certificate::count(),
            'legalitas_count' => Certificate::where('category', 'company_legalitas')->count(),
            'worker_cert_count' => Certificate::where('category', 'worker_certificate')->count(),
        ];

        $latestContacts = Contact::latest()->take(5)->get();
        $latestProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'latestContacts', 'latestProjects'));
    }
}