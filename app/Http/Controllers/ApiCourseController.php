<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Ruangan;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class ApiCourseController extends Controller
{
    //

    public function courseAll()
    {   
        $ruangans = DB::table('ruangans')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('ruangans.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();
        
        return response()->json($ruangans);
    }

    public function courseDetail($id)
    {
        $ruangans = DB::table('ruangans')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('ruangans.*', 'kelompoks.nama_kelompok')->where('courseId',$id)->get();

        $students = DB::table('students')->where('courseId',$id)->get();
        $teachers = DB::table('teachers')->where('courseId',$id)->get();
        // dd($students);
        return view ('pages.detail-ruangan', compact('ruangans', 'students','teachers'));    

    }



}
