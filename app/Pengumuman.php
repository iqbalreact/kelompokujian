<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
    protected $fillable = [
        'kategori_pengumuman','judul_pengumuman', 'isi_pengumuman',
    ];
}
