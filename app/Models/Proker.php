<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    // Define the table name explicitly if it doesn't follow Laravel's naming convention
    protected $table = 'proker';

    // Specify the primary key for the table
    protected $primaryKey = 'id_proker';

    // Set the primary key type as integer
    protected $keyType = 'int';

    // Disable auto-increment if not needed (optional)
    public $incrementing = true;

    // Define the fillable properties
    protected $fillable = [
        'id_divisi',
        'judul_proker',
        'deskripsi_proker',
        'foto_sampul_proker',
        'deskripsi_kegiatan_proker',
        'jumlah_hari_proker',
        'status_proker',
    ];

    /**
     * Define the relationship to the Divisi model.
     * Each Proker belongs to one Divisi.
     */
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id_divisi');
    }

    public function waktu_proker()
    {
        return $this->hasMany(WaktuProker::class, 'id_proker');
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'id_proker');
    }

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'id_kabinet', 'id_kabinet');
    }
}
