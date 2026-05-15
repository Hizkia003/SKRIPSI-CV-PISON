<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:' . implode(',', array_keys(Project::CATEGORIES)),
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
            'duration' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
            'duration' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $project->fill($data);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $project->thumbnail = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        $project->delete();
        return back()->with('success', 'Proyek berhasil dihapus');
    }
}