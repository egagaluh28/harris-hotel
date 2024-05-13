<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{   
    public function index()
    {
        return view('upload-kamar');
    }
    
    public function create(Request $request)
    {
        // Validasi data yang diunggah
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Pastikan file yang diunggah adalah gambar
            'deskripsi' => 'required|string',
            'person' => 'required|integer',
            'nomor_kamar' => 'required|string',
            'tipe_kamar' => 'required|string',
            'harga' => 'required|integer',
            'cabang_id' => 'required|integer',
            'size' => 'required|string',
            'beds' => 'required|integer',
            'bathrooms' => 'required|integer',
        ]);

        // Simpan gambar yang diunggah
        $imagePath = $request->file('image')->store('public/images');

        // Buat objek Kamar baru
        $kamar = new Kamar([
            'image' => $imagePath,
            'deskripsi' => $request->input('deskripsi'),
            'person' => $request->input('person'),
            'nomor_kamar' => $request->input('nomor_kamar'),
            'tipe_kamar' => $request->input('tipe_kamar'),
            'harga' => $request->input('harga'),
            'cabang_id' => $request->input('cabang_id'),
            'size' => $request->input('size'),
            'beds' => $request->input('beds'),
            'bathrooms' => $request->input('bathrooms'),
        ]);

        // Simpan data Kamar ke dalam database
        $kamar->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data kamar berhasil diunggah.');
    }
}