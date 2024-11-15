<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaksana extends Model
{
    use HasFactory;

    protected $table = 'pelaksana';
    protected $primaryKey = 'id_pelaksana';
    
    protected $fillable = [
        'id_mhs',
        'id_proker',
        'jabatan_pelaksana',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs', 'id_mhs');
    }

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker', 'id_proker');
    }
}
