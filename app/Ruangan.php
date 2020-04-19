<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    //
    protected $fillable = [
        'kelompok_id', 'courseId','ownerId','courseName','courseState','enrollmentCode','courseLink',
    ];

    public function kelompoks(){
        return $this->belongTo('App\Kelompok');
    }

    public function teachers(){
        return $this->belongsToMany('App\Teacher');
    }

    public function students(){
        return $this->belongsToMany('App\Student');
    }

}
