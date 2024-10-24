<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';  // Tambahkan baris ini

    protected $fillable = [
        "id_divisi",
        "id_kabinet",
        "nama_divisi",
        "deskripsi_divisi",
        "tugas_dan_tanggung_jawab"	
    ];
    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'id_kabinet', 'id_kabinet');
    }
}
