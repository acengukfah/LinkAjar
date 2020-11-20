<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Detail;
use Session;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all();
        $barangs = Barang::all();
        return view('detail.index', compact('details','barangs'));
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
        $detail = new Detail();
        $detail->barang_id = $request->barang_id;
        $detail->jumlah = $request->jumlah;
        $detail->harga_satuan = $request->harga;
        $detail->created_at = now();
        $detail->save();

        Session::flash('sukses', 'Data Detail Berhasil Disave!');

        return redirect('/detail');
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
        $detail = Detail::find($id);
        $detail->update($request->all());
        Session::flash('sukses', 'Data Detail Berhasil Diedit!');

        return redirect('/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Detail::find($id)->delete();
        Session::flash('sukses', 'Data Detail Berhasil Dihapus!');

        return redirect('/detail');
    }
}
