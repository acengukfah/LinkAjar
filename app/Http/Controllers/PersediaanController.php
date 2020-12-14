<?php

namespace App\Http\Controllers;

use App\Barang;
use App\JenisPersediaan;
use App\Pembukuan;
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
        $barangs = Barang::all();
        $pembukuans = Pembukuan::all();
        $jenis_persediaans = JenisPersediaan::all();
        return view('persediaan.index', compact('persediaans','barangs','pembukuans','jenis_persediaans'));
    }

    public function saldo_awal()
    {
        $persediaans = Persediaan::all()->where('jenis_persediaan_id',1);
        $barangs = Barang::all();
        $pembukuans = Pembukuan::all();
        $jenis_persediaans = JenisPersediaan::all();
        return view('persediaan.saldo_awal', compact('persediaans','barangs','pembukuans','jenis_persediaans'));
    }
    public function pembelian()
    {
        $persediaans = Persediaan::all()->where('jenis_persediaan_id',2);
        $barangs = Barang::all();
        $pembukuans = Pembukuan::all();
        $jenis_persediaans = JenisPersediaan::all();
        return view('persediaan.pembelian', compact('persediaans','barangs','pembukuans','jenis_persediaans'));
    }
    public function transfer_masuk()
    {
        $persediaans = Persediaan::all()->where('jenis_persediaan_id',3);
        $barangs = Barang::all();
        $pembukuans = Pembukuan::all();
        $jenis_persediaans = JenisPersediaan::all();
        return view('persediaan.transfer_masuk', compact('persediaans','barangs','pembukuans','jenis_persediaans'));
    }
    public function transfer_keluar()
    {
        $persediaans = Persediaan::all()->where('jenis_persediaan_id',4);
        $barangs = Barang::all();
        $pembukuans = Pembukuan::all();
        $jenis_persediaans = JenisPersediaan::all();
        return view('persediaan.transfer_keluar', compact('persediaans','barangs','pembukuans','jenis_persediaans'));
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
        $persediaan->barang_id = $request->barang_id;
        $persediaan->jumlah = $request->jumlah;
        $persediaan->harga_satuan = $request->harga_satuan;
        $persediaan->total = ($request->harga_satuan * $request->jumlah);
        $persediaan->pembukuan_id = $request->pembukuan_id;
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
