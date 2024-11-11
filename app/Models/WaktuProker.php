<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuProker extends Model
{
    use HasFactory;

    protected $table = 'waktu_proker';
    protected $primaryKey = 'id_waktu_proker';

    protected $fillable = ['id_proker', 'tanggal_kegiatan'];

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker', 'id_proker');
    }
}
