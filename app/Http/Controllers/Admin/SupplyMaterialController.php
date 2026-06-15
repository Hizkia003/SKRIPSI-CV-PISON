<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupplyMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SupplyMaterialController extends Controller
{
    public function index()
    {
        $materials = SupplyMaterial::orderBy('order')->get();
        return view('admin.supply-materials.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.supply-materials.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
        ]);

        // Siapkan data
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'), // checkbox
            'slug' => Str::slug($request->title) . '-' . time(),
        ];

        // Upload gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('supply-materials', 'public');
        }

        SupplyMaterial::create($data);

        return redirect()->route('admin.supply-materials.index')
            ->with('success', 'Material berhasil ditambahkan');
    }

    public function edit(SupplyMaterial $supply_material)
    {
        return view('admin.supply-materials.edit', compact('supply_material'));
    }

    public function update(Request $request, SupplyMaterial $supply_material)
    {
        // Validasi
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
            'delete_image' => 'nullable|in:on,1',
        ]);

        // Siapkan data update
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // Update slug jika title berubah
        if ($supply_material->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        // Hapus gambar jika dicentang
        if ($request->has('delete_image') && ($request->delete_image == 'on' || $request->delete_image == 1)) {
            if ($supply_material->image) {
                Storage::disk('public')->delete($supply_material->image);
                $data['image'] = null;
            }
        }

        // Upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($supply_material->image) {
                Storage::disk('public')->delete($supply_material->image);
            }
            $data['image'] = $request->file('image')->store('supply-materials', 'public');
        }

        $supply_material->update($data);

        return redirect()->route('admin.supply-materials.index')
            ->with('success', 'Material berhasil diperbarui');
    }

    public function destroy(SupplyMaterial $supply_material)
    {
        if ($supply_material->image) {
            Storage::disk('public')->delete($supply_material->image);
        }
        $supply_material->delete();

        return redirect()->route('admin.supply-materials.index')
            ->with('success', 'Material berhasil dihapus');
    }
}