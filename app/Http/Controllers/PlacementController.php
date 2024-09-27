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
}
