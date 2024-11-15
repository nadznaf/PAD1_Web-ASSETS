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

<<<<<<< HEAD

    protected $casts = [
        'dates_list' => 'array', // Cast JSON dates_list to array
        'start_date' => 'date',
        'end_date' => 'date',
    ];

=======
>>>>>>> bc82c7c8f0864a21171b079b8b18d18743e4bbc3
    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker', 'id_proker');
    }
}
