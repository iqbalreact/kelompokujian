<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    //
    protected $fillable = [
        'nama_kelompok', 'pj_kelompok',
    ];

    public function rooms(){
        return $this->hasMany('App\Kelas');
    }

    public function ruangans(){
        return $this->hasMany('App\Ruangan');
    }

}
