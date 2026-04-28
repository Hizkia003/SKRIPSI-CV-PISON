<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first() ?? About::create(['company_name' => 'CV. Pison Teknik Indonesia', 'description' => '']);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $about = About::first();
        $about->update($data);

        return back()->with('success', 'Profil perusahaan berhasil diperbarui');
    }
}