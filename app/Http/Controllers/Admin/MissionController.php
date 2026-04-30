<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function data()
    {
        $missions = Mission::orderBy('order')->get(['id', 'content', 'order', 'is_active']);
        return response()->json($missions);
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
        $mission = Mission::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Misi berhasil ditambahkan.',
            'data' => $mission,
        ]);
    }

    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'content' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('content', 'order');
        $data['is_active'] = $request->boolean('is_active');
        $mission->update($data);

        return response()->json(['success' => true, 'message' => 'Misi berhasil diperbarui.']);
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();
        return response()->json(['success' => true, 'message' => 'Misi berhasil dihapus.']);
    }
}