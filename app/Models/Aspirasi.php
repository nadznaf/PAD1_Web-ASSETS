<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'aspirasi';

    // Primary key
    protected $primaryKey = 'id_aspirasi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_pengirim',
        'judul_aspirasi',
        'isi_aspirasi',
    ];

    // Menonaktifkan auto-incrementing jika primary key tidak otomatis bertambah
    public $incrementing = true;

    // Menentukan apakah kunci utama adalah integer atau string
    protected $keyType = 'int';

    // Mengaktifkan pengaturan timestamps untuk menggunakan created_at dan updated_at
    public $timestamps = true;
}
