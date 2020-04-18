<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use DB;
class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengumumans =  Pengumuman::All();
        // dd($pengumumans);
        return view ('pages.pengumuman', compact('pengumumans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('add.tambahpengumuman');
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
        $pengumuman = new Pengumuman;
        $pengumuman->kategori_pengumuman = $request->kategori;
        $pengumuman->judul_pengumuman = $request->judul;
        $pengumuman->isi_pengumuman = $request->isi;
    
        $pengumuman->save();
        return redirect('/admin/pengumuman')->with('success', 'Berhasil Menambahkan Pengumuman');
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
        $pengumumans = DB::table('pengumumen')->where('id',$id)->get();
        // dd($kelompok);
        return view ('add.editpengumuman', compact('pengumumans'));

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
        DB::table('pengumumen')->where('id',$request->id)->update([
            'kategori_pengumuman' => $request->kategori,
            'judul_pengumuman' => $request->judul,
            'isi_pengumuman' => $request->isi,
        ]);
        return redirect('/admin/pengumuman');
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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect('/admin/pengumuman');
    }
}
