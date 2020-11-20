<?php

namespace App\Http\Controllers;

use App\Detail;
use App\JenisPersediaan;
use App\Persediaan;
use Session;
use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persediaans = Persediaan::all();
        $details = Detail::all();
        $jenis_persediaans = JenisPersediaan::all();

        return view('persediaan.index', compact('persediaans','details','jenis_persediaans'));
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
        $persediaan = new Persediaan();
        $persediaan->no_dokumen = $request->no_dokumen;
        $persediaan->no_bukti = $request->no_bukti;
        $persediaan->tgl_pembukuan = $request->tgl_pembukuan;
        $persediaan->tgl_dokumen = $request->tgl_dokumen;
        $persediaan->detail_id = $request->detail_id;
        $persediaan->jenis_persediaan_id = $request->jenis_persediaan_id;
        $persediaan->created_at = now();
        $persediaan->save();

        Session::flash('sukses', 'Data Persediaan Berhasil Disave!');

        return redirect('/persediaan');
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
        $persediaan = Persediaan::find($id);
        $persediaan->update($request->all());
        Session::flash('sukses', 'Data Persediaan Berhasil Diedit!');

        return redirect('/persediaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Persediaan::find($id)->delete();
        Session::flash('sukses', 'Data Persediaan Berhasil Dihapus!');

        return redirect('/persediaan');
    }
}
