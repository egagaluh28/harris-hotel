<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar'; // sesuaikan nama tabel jika diperlukan
    protected $fillable = [
        'image',
        'deskripsi',
        'person',
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'cabang_id',
        'size',
        'beds',
        'bathrooms',
    ];

    public function cabangHotel()
    {
        return $this->belongsTo(CabangHotel::class, 'cabang_id');
    }

}