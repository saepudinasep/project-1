<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Placement;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addNewData(Request $request)
    {
        $data = $request->all();

        foreach ($data as $item) {
            if ($item['type'] === 'placement') {
                // Simpan data placement
                Placement::create(['id' => $item['id']]);
            } elseif ($item['type'] === 'kas') {
                // Simpan data kas
                Kas::create(['id' => $item['id']]);
            }
        }

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function deleteData(Request $request)
    {
        $data = $request->all();

        foreach ($data as $item) {
            if ($item['type'] === 'placement') {
                // Hapus data placement
                Placement::where('id', $item['id'])->delete();
            } elseif ($item['type'] === 'kas') {
                // Hapus data kas
                Kas::where('id', $item['id'])->delete();
            }
        }

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
