<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'courseId', 'nameStudent','userId',
    ];

    public function rooms(){
        return $this->hasMany('App\Kelas');
    }

    public function ruangans(){
        return $this->belongsToMany('App\Ruangan');
    }
}
