<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabinet extends Model
{
    protected $table = 'kabinet';
    protected $primaryKey = 'id_kabinet';  // Tambahkan baris ini


    protected $fillable = [
        "id_kabinet",
        "id_dosen",
        "nama_kabinet",
        "logo_kabinet",
        "visi_kabinet",
        "misi_kabinet",
        "makna_kabinet",
        "tahun_awal_kabinet",
        "tahun_akhir_kabinet",
        "deskripsi_kabinet",
        "foto_sampul_kabinet"
    ];

    public function color_pallete()
    {
        return $this->hasOne(ColorPallete::class, 'id_kabinet', 'id_kabinet');
    }

    public function divisi()
    {
        return $this->hasMany(Divisi::class, 'id_kabinet', 'id_kabinet');
    }
}
