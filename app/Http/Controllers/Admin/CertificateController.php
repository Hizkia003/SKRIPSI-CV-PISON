<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|string|max:100',
            'category' => 'required|in:company_legalitas,worker_certificate',
            'file' => 'required|file|mimes:pdf|max:10240',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('file');
        $data['is_active'] = $request->boolean('is_active');

        // 🟢 Tambahan untuk kolom lama yang masih NOT NULL
        $data['subtitle'] = $request->input('subtitle', '');
        $data['image'] = $request->input('image', '');

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|string|max:100',
            'category' => 'required|in:company_legalitas,worker_certificate',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->except('file');
        $data['is_active'] = $request->boolean('is_active');

        // 🟢 Jaga agar kolom lama tetap terisi
        $data['subtitle'] = $request->input('subtitle', $certificate->subtitle ?? '');
        $data['image'] = $request->input('image', $certificate->image ?? '');

        if ($request->hasFile('file')) {
            if ($certificate->file && Storage::disk('public')->exists($certificate->file)) {
                Storage::disk('public')->delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file && Storage::disk('public')->exists($certificate->file)) {
            Storage::disk('public')->delete($certificate->file);
        }
        $certificate->delete();
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}