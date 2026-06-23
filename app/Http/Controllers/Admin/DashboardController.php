<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Certificate;
// Hapus use App\Models\Contact; karena sudah tidak ada

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'certificates' => Certificate::count(),
            'legalitas_count' => Certificate::where('category', 'company_legalitas')->count(),
            'worker_cert_count' => Certificate::where('category', 'worker_certificate')->count(),
        ];

        // Ambil 5 proyek terbaru
        $latestProjects = Project::latest()->take(5)->get();

        // Tidak ada $latestContacts karena tabel contacts sudah dihapus

        return view('admin.dashboard.index', compact('stats', 'latestProjects'));
    }
}