<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin'; // Pastikan tabelnya adalah 'admin'
    
    protected $fillable = [
        'email_admin',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getAuthIdentifierName()
    {
        return 'id_admin'; // Sesuaikan dengan nama kolom email di tabel admin
    }

}
