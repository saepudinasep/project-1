<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Kas;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PlacementController extends Controller
{
    public function index()
    {
        $placements = Placement::with(['user', 'branch', 'kas'])
            ->paginate(10);
        return inertia('Placement/Index', [
            'placements' => $placements,
            'success' => session('success'),
        ]);
    }

    public function create()
    {
        $branches = Branch::all();
        $kases = Kas::whereDoesntHave('placements')->get();

        return inertia('Placement/Create', [
            'branches' => $branches,
            'kases' => $kases,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch' => 'required',
            'kas' => 'required',
        ]);

        // Create a new placement
        $placement = new Placement();
        $placement->id_user = Auth::id();
        $placement->id_branch = $request->input('branch');
        $placement->id_kas = $request->input('kas');
        $placement->save();

        // Redirect to the placements index page
        return redirect()->route('placement.index');
    }
}
