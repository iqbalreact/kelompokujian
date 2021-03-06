<?php

namespace App\Http\Controllers;

use App\Kelompok;
use Illuminate\Http\Request;
use DB;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompoks =  Kelompok::orderBy('nama_kelompok')->get();
        return view ('pages.kelompok', compact('kelompoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view ('add.tambahkk');
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
        $kelompok = new Kelompok;
        $kelompok->nama_kelompok = $request->kelompok;
        $kelompok->pj_kelompok = $request->pj;
    
        $kelompok->save();
        return redirect('/admin/kelompok')->with('success', 'Berhasil Menambahkan Kelompok Keahlian');
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
        $kelompoks = DB::table('kelompoks')->where('id',$id)->get();
        // dd($kelompok);
        return view ('add.editkk', compact('kelompoks'));
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
        DB::table('kelompoks')->where('id',$request->id)->update([
            'kelompok_id' => $request->kelompok_id,
            'nama_kelompok' => $request->kelompok,
            'pj_kelompok' => $request->pj,
        ]);
        
        return redirect('/admin/kelompok');

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
        $kelompok = Kelompok::find($id);
        $kelompok->delete();
        return redirect('/admin/kelompok');
    }
}
