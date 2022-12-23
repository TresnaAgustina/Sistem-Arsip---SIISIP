<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'tahun_pengadaan',
        'lokasi',
        'penyedia',
        'latitude',
        'longitude',
        'detail',
        'catatan',
    ];


}
