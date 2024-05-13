<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna'; // sesuaikan nama tabel jika diperlukan

    // Relasi dengan tabel HakAkses
    public function hakAkses()
    {
        return $this->belongsTo(HakAkses::class, 'hak_akses_id');
    }
}