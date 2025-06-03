<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'id_divisi',
        'id_mhs',
        'nama_jabatan',
        'foto_pose_staff'
    ];

    // Defining the relationship with the Divisi model
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id_divisi');
    }

    // Defining the relationship with the Mahasiswa model
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs', 'id_mhs');
    }

    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'kabinet', 'kabinet');
    }
}
