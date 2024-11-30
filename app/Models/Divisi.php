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
        "tugas_dan_tanggung_jawab",
        "foto_sampul_divisi"
    ];
    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'id_kabinet', 'id_kabinet');
    }
    public function staff()
    {
        return $this->hasMany(Staff::class, 'id_staff', 'id_staff');
    }
    public function proker()
    {
        return $this->hasMany(Staff::class, 'id_divisi', 'id_divisi');
    }
}
