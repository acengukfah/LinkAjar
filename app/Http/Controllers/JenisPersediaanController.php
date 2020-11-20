<?php

namespace App\Http\Controllers;

use App\JenisPersediaan;
use Session;
use Illuminate\Http\Request;

class JenisPersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_persediaans = JenisPersediaan::all();
        return view('jenis_persediaan.index', compact('jenis_persediaans'));
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
        $jenis_persediaan = new JenisPersediaan();
        $jenis_persediaan->nama = $request->nama;
        $jenis_persediaan->created_at = now();
        $jenis_persediaan->save();

        Session::flash('sukses', 'Data Jenis Persediaan Berhasil Disave!');

        return redirect('/jenis-persediaan');
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
        $jenis_persediaan = JenisPersediaan::find($id);
        $jenis_persediaan->update($request->all());
        Session::flash('sukses', 'Data Jenis Persediaan Berhasil Diedit!');

        return redirect('/jenis-persediaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisPersediaan::find($id)->delete();
        Session::flash('sukses', 'Data Jenis Persediaan Berhasil Dihapus!');

        return redirect('/jenis-persediaan');
    }
}
