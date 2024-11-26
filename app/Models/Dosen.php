<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen_pebimbing';
    protected $primaryKey = 'id_dosen';  // Tambahkan baris ini

    
    protected $fillable = [
        'nama_dosen',
        'nika_dosen',
        'foto_profil_dosen',
    ];
}
