<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = DB::table('rak_buku')
                    ->join('buku','rak_buku.id_buku','=','buku.id')
                    ->join('jenis_buku','rak_buku.id_jenis_buku','=','jenis_buku.id')
                    ->get();
        return view('buku.index0042',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenises = DB::table('jenis_buku')->get();
        $bukus = DB::table('buku')->get();
        return view('buku.create0042',compact('jenises','bukus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new Buku();
        $buku->id_buku = $request->judul;
        $buku->id_jenis_buku = $request->jenis;
        $buku->save();
        return redirect()->route('buku.index')
                         ->with('success','Data berhasil ditambahkan');
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
        $jenises = DB::table('jenis_buku')->get();
        $bukus = DB::table('buku')->get();
        $rak = DB::table('rak_buku')->where('id',$id)->first();
        return view('buku.edit0042',compact('jenises','bukus','rak'));
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
        $buku = Buku::find($id);
        $buku->id_buku = $request->judul;
        $buku->id_jenis_buku = $request->jenis;
        $buku->save();
        return redirect()->route('buku.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Buku::find($id);
        $mahasiswa->delete();
        return redirect()->route('buku.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
