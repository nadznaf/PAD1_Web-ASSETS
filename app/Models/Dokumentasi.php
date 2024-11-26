<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    public $timestamps = true;

    protected $fillable = [
        'id_proker',
        'isi_dokumentasi',
        'keterangan_hari',
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker', 'id_proker');
    }
}
