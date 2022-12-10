<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'tanggal',
        'kategori',
        'judul',
        'link_file',
        'uraian',
    ];


    protected $hidden = [
        'link_file',
    ];
}
