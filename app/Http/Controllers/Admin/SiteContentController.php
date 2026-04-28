<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function edit()
    {
        $content = SiteContent::firstOrCreate([]);
        return view('admin.site-contents.edit', compact('content'));
    }

    public function update(Request $request)
    {
        $content = SiteContent::firstOrCreate([]);

        $data = $request->validate([
            'home_description' => 'required|string|max:500',
            'total_projects' => 'required|integer|min:0|max:99999',
            'experience_years' => 'required|integer|min:0|max:100',
        ]);

        $content->update($data);

        return back()->with('success', 'Konten Home berhasil diperbarui!');
    }
}