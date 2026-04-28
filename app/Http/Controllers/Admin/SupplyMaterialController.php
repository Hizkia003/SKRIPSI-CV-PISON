<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupplyMaterial;
use Illuminate\Http\Request;

class SupplyMaterialController extends Controller
{
    public function index()
    {
        $materials = SupplyMaterial::orderBy('order')->paginate(10);
        return view('admin.supply-materials.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.supply-materials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        SupplyMaterial::create($data);
        return redirect()->route('admin.supply-materials.index')->with('success', 'Material berhasil ditambahkan');
    }

    public function edit(SupplyMaterial $supply_material)
    {
        return view('admin.supply-materials.edit', compact('supply_material'));
    }

    public function update(Request $request, SupplyMaterial $supply_material)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $supply_material->update($data);
        return redirect()->route('admin.supply-materials.index')->with('success', 'Material berhasil diperbarui');
    }

    public function destroy(SupplyMaterial $supply_material)
    {
        $supply_material->delete();
        return back()->with('success', 'Material berhasil dihapus');
    }
}
