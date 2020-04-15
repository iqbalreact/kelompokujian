<?php

namespace App\Http\Controllers;

use App\Kelompok;
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
        
        $kelompoks = Kelompok::All();

        $rooms = DB::table('rooms')
        ->join('kelompoks', 'rooms.kelompok_id', '=', 'kelompoks.id')
        ->select('rooms.*', 'kelompoks.nama_kelompok')
        // ->groupBy('kelompoks.nama_kelompok')
        ->get();

        $result = array();
        foreach($rooms as $d){
            if(!isset($result[$d->kelompok_id])){
                $result[$d->kelompok_id] = array();
            }
            $result[$d->kelompok_id][] = $d;
        }
        // dd($result);
        
        return view ('pages.dashboard', compact('kelompoks','result'));
    }
}
