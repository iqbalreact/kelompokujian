<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'kelompok_id', 'nama_kelas','kode_kelas',
    ];

    public function kelompoks(){
        return $this->belongTo('App\Kelompok');
    }
}
