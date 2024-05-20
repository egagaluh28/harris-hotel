<?php

namespace App\Http\Controllers;

use App\Models\CabangHotel;
use App\Models\Kamar;
use Illuminate\Http\Request;

class GridRoomController extends Controller
{
    public function map()
    {
        $cabanghotels = CabangHotel::all(); // Mengambil semua data cabang hotel dari database
        
        return view('room-details', compact('cabanghotels'));
    }

    
    public function grid(Request $request)
    {
        $selectedBranch = $request->input('branch'); // Ambil nilai cabang yang dipilih dari request

        $query = Kamar::query();

        if ($selectedBranch) {
            $query->where('cabang_id', $selectedBranch);
        }

        $kamars = $query->paginate(6); // Menggunakan paginate() untuk melakukan pagination dengan 6 item per halaman

        $cabanghotels = CabangHotel::all(); // Mengambil semua data cabang hotel dari database

        return view('room-grid', compact('kamars', 'cabanghotels', 'selectedBranch'));
    }



    public function detail($id)
    {
        $kamar = Kamar::findOrFail($id); // Mengambil data kamar berdasarkan ID
        return view('room-details', compact('kamar'));
    }

    public function getFormattedNominals()
    {
        $harga = Kamar::selectRaw("FORMAT(nominal, 0, 'id_ID') AS rupiah")->get();

        return $harga;
    }
}