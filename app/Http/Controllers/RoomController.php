<?php

namespace App\Http\Controllers;

use App\Room;
use App\Kelompok;
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
        $rooms = DB::table('rooms')
        ->join('kelompoks', 'rooms.kelompok_id', '=', 'kelompoks.id')
        ->select('rooms.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();
        
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
        $kelompoks = Kelompok::All(); 
        return view ('add.tambahkelas', compact('kelompoks'));
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
        $room = new Room;
        $room->kelompok_id = $request->kelompok_id;
        $room->nama_kelas = $request->nama_kelas;
        $room->kode_kelas = $request->kode;
    
        $room->save();
        return redirect('/admin/kelas')->with('success', 'Berhasil Menambahkan Kelas');
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
        $kelompoks = Kelompok::All(); 
        $rooms = DB::table('rooms')->where('id',$id)->get();
        // dd($kelompok);
        return view ('add.editkelas', compact('rooms','kelompoks'));
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
        DB::table('rooms')->where('id',$request->id)->update([
            'kelompok_id' => $request->kelompok_id,
            'nama_kelas' => $request->nama_kelas,
            'kode_kelas' => $request->kode,
        ]);
        
        return redirect('/admin/kelas');
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
        $kelas = Room::find($id);
        $kelas->delete();
        return redirect('/admin/kelas');
    }
}
