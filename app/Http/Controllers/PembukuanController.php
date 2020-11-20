<?php

namespace App\Http\Controllers;

use App\Pembukuan;
use Session;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembukuans = Pembukuan::all();
        return view('pembukuan.index', compact('pembukuans'));
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
        $pembukuan = new Pembukuan();
        $pembukuan->no_dokumen = $request->no_dokumen;
        $pembukuan->no_bukti = $request->no_bukti;
        $pembukuan->tgl_pembukuan = $request->tgl_pembukuan;
        $pembukuan->tgl_dokumen = $request->tgl_dokumen;
        $pembukuan->created_at = now();
        $pembukuan->save();

        Session::flash('sukses', 'Data Pembukuan Berhasil Disave!');

        return redirect('/pembukuan');
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
        $pembukuan = Pembukuan::find($id);
        $pembukuan->update($request->all());
        Session::flash('sukses', 'Data Pembukuan Berhasil Diedit!');

        return redirect('/pembukuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembukuan::find($id)->delete();
        Session::flash('sukses', 'Data Pembukuan Berhasil Dihapus!');

        return redirect('/pembukuan');
    }
}
