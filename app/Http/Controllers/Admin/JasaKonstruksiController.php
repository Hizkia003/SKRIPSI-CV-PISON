<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JasaKonstruksi;
use App\Models\JasaKonstruksiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JasaKonstruksiController extends Controller
{
    public function index()
    {
        $jasa = JasaKonstruksi::orderBy('order')->get();
        return view('admin.jasa-konstruksi.index', compact('jasa'));
    }

    public function create()
    {
        return view('admin.jasa-konstruksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'icon' => 'nullable|string|max:50',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
            'icon' => $validated['icon'] ?? 'bi-building',
            'slug' => Str::slug($validated['title']) . '-' . time(),
        ];

        $jasa = JasaKonstruksi::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('jasa-konstruksi', 'public');
                $jasa->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('admin.jasa-konstruksi.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(JasaKonstruksi $jasa_konstruksi)
    {
        return view('admin.jasa-konstruksi.edit', compact('jasa_konstruksi'));
    }

    public function update(Request $request, JasaKonstruksi $jasa_konstruksi)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'icon' => 'nullable|string|max:50',
            'images.*' => 'nullable|image|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:jasa_konstruksi_images,id',
        ]);

        // Data yang akan diupdate (hanya kolom yang ada di tabel)
        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
            'icon' => $validated['icon'] ?? 'bi-building',
        ];

        // Update slug jika title berubah
        if ($jasa_konstruksi->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']) . '-' . time();
        }

        $jasa_konstruksi->update($data);

        // Hapus gambar yang dicentang
        if ($request->has('delete_images')) {
            $imagesToDelete = JasaKonstruksiImage::whereIn('id', $request->delete_images)->get();
            foreach ($imagesToDelete as $img) {
                Storage::disk('public')->delete($img->image);
                $img->delete();
            }
        }

        // Upload gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('jasa-konstruksi', 'public');
                $jasa_konstruksi->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('admin.jasa-konstruksi.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(JasaKonstruksi $jasa_konstruksi)
    {
        // Hapus semua gambar terkait dari storage
        foreach ($jasa_konstruksi->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }
        $jasa_konstruksi->delete();

        return redirect()->route('admin.jasa-konstruksi.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}