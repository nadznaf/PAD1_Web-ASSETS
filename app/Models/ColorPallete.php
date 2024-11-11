<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorPallete extends Model
{
    protected $table = 'color_pallete';
    protected $primaryKey = 'id_color_pallete';  // Tambahkan baris ini

    protected $fillable = [
        "id_color_pallete",
        "id_kabinet",
        "primary_color",
        "secondary_color",
    ];
    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class, 'id_kabinet', 'id_kabinet');
    }
}
