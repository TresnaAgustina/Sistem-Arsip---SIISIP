<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bsi extends Model
{
    use HasFactory;

protected $fillable = [
        'kategori',
        'kabupaten',
        'kecamatan',
        'desa',
        'desa_pekraman',
        'data_lokasi',
        'media',
        'layanan',
        'lokasi',
        'latitude',
        'longitude',
        'nama_pic',
        'nomor_tlp',
    ];
}
