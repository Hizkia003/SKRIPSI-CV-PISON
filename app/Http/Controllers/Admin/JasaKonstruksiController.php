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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;
        unset($data['images']);

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

    public function update(Request $request, JasaKonstruksi $jasa_konstruksi)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_active'] = $request->has('is_active');
        unset($data['images']);

        $jasa_konstruksi->update($data);

        // Hapus gambar yang ditandai
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imgId) {
                $img = JasaKonstruksiImage::find($imgId);
                if ($img && $img->jasa_konstruksi_id == $jasa_konstruksi->id) {
                    Storage::disk('public')->delete($img->image);
                    $img->delete();
                }
            }
        }

        // Tambah gambar baru
        if ($request->hasFile('images')) {
            $currentCount = $jasa_konstruksi->images()->count();
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('jasa-konstruksi', 'public');
                $jasa_konstruksi->images()->create(['image' => $path, 'order' => $currentCount + $i]);
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
