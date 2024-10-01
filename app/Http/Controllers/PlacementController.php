<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index()
    {
        $placements = Placement::with(['user'])
            ->groupby('user_id')
            ->paginate(10);
        return inertia('Placement/Index', [
            'placements' => $placements,
            'success' => session('success'),
        ]);
    }

    public function show($id)
    {
        $placements = Placement::with(['user', 'branch', 'kas'])
            ->where('user_id', $id)
            ->paginate(10);

        $kases = Kas::whereDoesntHave('placements')->paginate(10);

        return inertia('Placement/Show', [
            'placements' => $placements,
            'kases' => $kases,
            'success' => session('success'),
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*.id' => 'required|integer',
            'data.*.type' => 'required|string|in:placement,kas',
        ]);

        // Create new placements or kas based on the request data
        foreach ($validatedData['data'] as $item) {
            if ($item['type'] === 'placement') {
                Placement::create(
                    [
                        'id' => $item['id'],
                        'user_id' => Auth()->id,
                        'branch_id' => '',
                        'kas_id' => ''
                    ]
                );
            } elseif ($item['type'] === 'kas') {
                // Create new kas instance
                Kas::create(
                    [
                        'id' => $item['id'],
                        'name' => ''
                    ]
                );
            }
        }

        return response()->json(['message' => 'Data created successfully']);
    }

    public function destroy(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*.id' => 'required|integer',
            'data.*.type' => 'required|string|in:placement,kas',
        ]);

        // Delete placements or kas based on the request data
        foreach ($validatedData['data'] as $item) {
            if ($item['type'] === 'placement') {
                Placement::find($item['id'])->delete();
            } elseif ($item['type'] === 'kas') {
                Kas::find($item['id'])->delete();
            }
        }

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
