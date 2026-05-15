<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JasaKonstruksi;
use App\Models\JasaKonstruksiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JasaKonstruksiController extends Controller
{
    public function index()
    {
        $jasa = JasaKonstruksi::with('images')->orderBy('order')->paginate(10);
        return view('admin.jasa-konstruksi.index', compact('jasa'));
    }

    public function create()
    {
        return view('admin.jasa-konstruksi.create');
    }

    public function store(Request $request)
    {
        // Pastikan is_active selalu dikirim sebagai boolean
        $request->merge([
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',  // sekarang selalu ada (true/false)
            'order' => 'nullable|integer|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data = $request->except('images');
        $data['order'] = $validated['order'] ?? 0;

        $jasa = JasaKonstruksi::create($data);

        // Simpan gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('jasa-konstruksi', 'public');
                $jasa->images()->create(['image' => $path, 'order' => $i]);
            }
        }

        return redirect()->route('admin.jasa-konstruksi.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(JasaKonstruksi $jasa_konstruksi)
    {
        $jasa_konstruksi->load('images');
        return view('admin.jasa-konstruksi.edit', compact('jasa_konstruksi'));
    }

    public function update(Request $request, $id) // atau (Request $request, JasaKonstruksi $jasaKonstruksi)
    {
        $jasa = JasaKonstruksi::findOrFail($id);

        $request->merge([
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data = $request->except('images');
        $data['order'] = $validated['order'] ?? 0;

        $jasa->update($data);

        if ($request->hasFile('images')) {
            // Opsional: hapus gambar lama
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('jasa-konstruksi', 'public');
                $jasa->images()->create(['image' => $path, 'order' => $i]);
            }
        }

        return redirect()->route('admin.jasa-konstruksi.index')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(JasaKonstruksi $jasa_konstruksi)
    {
        // Hapus semua gambar terkait
        foreach ($jasa_konstruksi->images as $img) {
            Storage::disk('public')->delete($img->image);
        }
        $jasa_konstruksi->delete();
        return back()->with('success', 'Layanan berhasil dihapus');
    }
}
