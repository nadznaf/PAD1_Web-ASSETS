<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';  // Tambahkan baris ini


    protected $fillable = [
        'nama_mhs',
        'foto_profil_mhs',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'id_mhs', 'id_mhs');
    }
}
