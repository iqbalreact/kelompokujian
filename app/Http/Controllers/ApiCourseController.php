<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Ruangan;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use DB;

class ApiCourseController extends Controller
{
    //

    public function courseAll()
    {   
        
        $ruangans = DB::table('gmeets')
        ->join('ruangans', 'gmeets.courseId', '=', 'ruangans.courseId')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('gmeets.*', 'ruangans.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();
        
        return response()->json($ruangans);
    }

    public function courseDetail($courseId)
    {

        $ruangans = DB::table('gmeets')
        ->join('ruangans', 'gmeets.courseId', '=', 'ruangans.courseId')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('gmeets.*', 'ruangans.*', 'kelompoks.nama_kelompok')
        ->where('ruangans.courseId',$courseId)->get();

        return response()->json($ruangans);  

    }

    // public function studentAll()
    // {   
    //     $students = Student::All()
    //     ->groupBy('courseId');
    //     return response()->json($students);
    // }

    // public function studentList($courseId)
    // {   
    //     // echo $courseId;
    //     $students = DB::table('students')
    //     ->where('courseId', $courseId)->get();
    //     return response()->json($students);

    // }


}
