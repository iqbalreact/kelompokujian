<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Kelas;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelompoks = Kelompok::All();

        $rooms = DB::table('rooms')
        ->join('kelompoks', 'rooms.kelompok_id', '=', 'kelompoks.id')
        ->select('rooms.*', 'kelompoks.nama_kelompok')
        ->get();

        $result = array();
        foreach($rooms as $d){
            if(!isset($result[$d->kelompok_id])){
                $result[$d->kelompok_id] = array();
            }
            $result[$d->kelompok_id][] = $d;
        }
        // dd($result);
        
        return view ('home.beranda', compact('kelompoks','result'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
