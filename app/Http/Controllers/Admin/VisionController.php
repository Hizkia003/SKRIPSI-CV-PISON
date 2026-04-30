<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function data()
    {
        $visions = Vision::orderBy('order')->get(['id', 'content', 'order', 'is_active']);
        return response()->json($visions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('content', 'order');
        $data['is_active'] = $request->boolean('is_active');
        $vision = Vision::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Visi berhasil ditambahkan.',
            'data' => $vision,
        ]);
    }

    public function update(Request $request, Vision $vision)
    {
        $request->validate([
            'content' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('content', 'order');
        $data['is_active'] = $request->boolean('is_active');
        $vision->update($data);

        return response()->json(['success' => true, 'message' => 'Visi berhasil diperbarui.']);
    }

    public function destroy(Vision $vision)
    {
        $vision->delete();
        return response()->json(['success' => true, 'message' => 'Visi berhasil dihapus.']);
    }
}