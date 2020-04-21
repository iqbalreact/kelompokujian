<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gmeet extends Model
{
    //

    protected $table = 'gmeets';

    protected $fillable = [
        'courseId', 'kode_kelas',
    ];

    public function ruangans(){
        return $this->hasOne('App\ruangan','courseId');
    }
}
