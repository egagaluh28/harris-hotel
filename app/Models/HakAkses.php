<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    protected $table = 'hakAkses'; // sesuaikan nama tabel jika diperlukan

    // Relasi dengan tabel Pengguna
    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'hak_akses_id');
    }
}