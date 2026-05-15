<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(9);
        return view('pages.projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();
        return view('pages.project-detail', compact('project', 'relatedProjects'));
    }
}