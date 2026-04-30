<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::firstOrCreate([], [
            'company_name' => 'CV. Pison Teknik Indonesia',
        ]);
        return view('admin.contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $contactInfo = ContactInfo::firstOrCreate([]);

        $data = $request->validate([
            'company_name'  => 'required|string|max:255',
            'address'       => 'nullable|string|max:500',
            'whatsapp'      => 'nullable|string|max:15',
            'email'         => 'nullable|email|max:255',
            'working_hours' => 'nullable|string|max:255',
            'map_embed'     => 'nullable|string',
            'tiktok'        => 'nullable|url|max:255',
            'copyright_text'=> 'nullable|string|max:255',
        ]);

        $contactInfo->update($data);

        return back()->with('success', 'Informasi kontak berhasil diperbarui.');
    }
}