<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PlacementController extends Controller
{
    public function index()
    {
        return "Placement";
        // return Inertia::render('Placement/Index');
    }
}
