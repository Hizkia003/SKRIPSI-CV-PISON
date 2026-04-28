<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function edit() {
        $footer = FooterSetting::firstOrCreate([]);
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request) {
        $footer = FooterSetting::firstOrCreate([]);

        $data = $request->validate([
            'brand_name' => 'required|string|max:100',
            'brand_tagline' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'company_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'whatsapp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'working_hours' => 'nullable|string|max:255',
            'map_embed' => 'nullable|string',
            'tiktok' => 'nullable|url|max:255',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        $footer->update($data);

        return back()->with('success', 'Pengaturan Footer berhasil diperbarui!');
    }
}