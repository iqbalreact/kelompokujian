<?php

namespace App\Http\Controllers;

use App\Gmeet;
use App\Kelompok;
use App\Ruangan;
use Illuminate\Http\Request;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = DB::table('gmeets')
        ->join('ruangans', 'gmeets.courseId', '=', 'ruangans.courseId')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('gmeets.*', 'ruangans.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();
        // dd($rooms);
        // $rooms = Gmeet::All();
        return view ('pages.kelas', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruangans = DB::table('ruangans')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('ruangans.*', 'kelompoks.nama_kelompok')
        ->get();
        // dd($ruangans);
        return view ('add.tambahkelas', compact('ruangans'));
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
        // dd($request);
        $room = new Gmeet;
        $room->courseId = $request->courseId;
        $room->kode_kelas = $request->kode;
    
        $room->save();
        return redirect('/admin/kelas')->with('success', 'Berhasil Menambahkan Kode Kelas');
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
        $rooms = DB::table('gmeets')->where('courseId',$id)->get();
        return view ('add.editkelas', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('gmeets')->where('courseId',$request->id)->update([
            'kode_kelas' => $request->kode,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        //
        $kelas = Gmeet::find($courseId);
        $kelas->delete();
        // return redirect('/admin/kelas');
    }
}
