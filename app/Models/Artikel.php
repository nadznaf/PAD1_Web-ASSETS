<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'artikel';

    // Primary key
    protected $primaryKey = 'id_artikel';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'judul_artikel',
        'nama_penulis',
        'tanggal_terbit',
        'foto_sampul_artikel',
        'tautan_artikel_resmi',
        'konten_artikel',
    ];

    // Menonaktifkan auto-incrementing jika primary key tidak otomatis bertambah
    public $incrementing = true;

    // Menentukan apakah kunci utama adalah integer atau string
    protected $keyType = 'int';

    // Menonaktifkan pengaturan timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;
}
