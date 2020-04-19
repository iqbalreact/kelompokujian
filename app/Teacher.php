<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'courseId', 'nameTeacher', 'userId',
    ];

    public function ruangans(){
        return $this->belongsToMany('App\Ruangan');
    }
}
