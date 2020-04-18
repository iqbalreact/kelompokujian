<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    //
    protected $fillable = [
        'kelompok_id', 'courseId','courseName','courseLink',
    ];

    public function kelompoks(){
        return $this->belongTo('App\Kelompok');
    }
}
