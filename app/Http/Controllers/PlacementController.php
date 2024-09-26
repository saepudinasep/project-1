<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlacementController extends Controller
{
    public function index()
    {
        // $query = Placement::query()->with(['user', 'branch', 'kas']);
        // // $relations = $query->with(['user', 'branch', 'kas']);
        // $placements = $query->paginate(5);
        // dd($placements);
        // return inertia('Placement/Index', [
        //     'placements' => $placements,
        //     'success' => session('success'),
        // ]);
        $placements = Placement::with(['user', 'branch', 'kas'])->paginate(5);
        return inertia('Placement/Index', [
            'placements' => $placements,
            'success' => session('success'),
        ]);
    }
}
