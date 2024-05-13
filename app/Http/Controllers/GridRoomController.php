<?php

namespace App\Http\Controllers;

use App\Models\GridRoom;
use App\Models\Kamar;

use Illuminate\Http\Request;

class GridRoomController extends Controller
{
    public function grid()
    {
        $kamars = Kamar::all(); // Mengambil semua data kamar dari database
        
        return view('room-grid', compact('kamars'));
    }

    public function detail($id)
    {
        $kamar = Kamar::findOrFail($id); // Mengambil data kamar berdasarkan ID
        return view('room-details', compact('kamar'));
    }

    public function getFormattedNominals()
{
    $harga = Kamar::table('kamar')
                    ->select(Kamar::raw("FORMAT(nominal, 0, 'id_ID') AS rupiah"))
                    ->get();

    return $harga;
}

}