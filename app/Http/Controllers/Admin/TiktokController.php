<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiktok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TiktokController extends Controller
{
    public function index()
    {
        $tiktoks = Tiktok::orderBy('order')->latest()->paginate(12);
        return view('admin.tiktoks.index', compact('tiktoks'));
    }

    public function create()
    {
        return view('admin.tiktoks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        Tiktok::create($data);
        return redirect()->route('admin.tiktoks.index')->with('success', 'Video TikTok berhasil ditambahkan');
    }

    public function edit(Tiktok $tiktok)
    {
        return view('admin.tiktoks.edit', compact('tiktok'));
    }

    public function update(Request $request, Tiktok $tiktok)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');

        $tiktok->update($data);
        return redirect()->route('admin.tiktoks.index')->with('success', 'Video TikTok berhasil diperbarui');
    }

    public function destroy(Tiktok $tiktok)
    {
        if ($tiktok->thumbnail) Storage::disk('public')->delete($tiktok->thumbnail);
        $tiktok->delete();
        return back()->with('success', 'Video TikTok berhasil dihapus');
    }
}