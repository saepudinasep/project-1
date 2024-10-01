<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlacementController extends Controller
{
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
