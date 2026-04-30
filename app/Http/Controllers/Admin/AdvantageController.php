<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function data()
    {
        $advantages = Advantage::orderBy('order')->get(['id', 'content', 'order', 'is_active']);
        return response()->json($advantages);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500', // description
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('name', 'content', 'order');
        $data['is_active'] = $request->boolean('is_active');

        $advantage = Advantage::create($data);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Keunggulan berhasil ditambahkan.', 'data' => $advantage]);
        }
        return redirect()->route('admin.advantages.index')->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    public function update(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('name', 'content', 'order');
        $data['is_active'] = $request->boolean('is_active');
        $advantage->update($data);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Keunggulan berhasil diperbarui.']);
        }
        return redirect()->route('admin.advantages.index')->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        return response()->json(['success' => true, 'message' => 'Keunggulan berhasil dihapus.']);
    }
}