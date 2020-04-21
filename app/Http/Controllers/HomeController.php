<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Gmeet;
use App\Kelas;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        $rooms = DB::table('gmeets')
        ->join('ruangans', 'gmeets.courseId', '=', 'ruangans.courseId')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('gmeets.*', 'ruangans.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();


        $result = array();
        foreach($rooms as $d){
            if(!isset($result[$d->kelompok_id])){
                $result[$d->kelompok_id] = array();
            }
            $result[$d->kelompok_id][] = $d;
        }
        // dd($result);
        
        return view ('pages.dashboard', compact('result'));
    }
}
