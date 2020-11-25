<?php

namespace App\Http\Controllers;

use App\Pembukuan;
use App\Exports\SaldoAwalExport;
use App\Exports\PembelianExport;
use App\Exports\TransferMasukExport;
use App\Exports\TransferKeluarExport;
use App\KategoriBarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    public function saldo_awal(){
        return $this->excel->download(new SaldoAwalExport, 'saldo_awal.xlsx');
    }
    public function pembelian(){
        return $this->excel->download(new PembelianExport, 'pembelian.xlsx');
    }
    public function transfer_masuk(){
        return $this->excel->download(new TransferMasukExport, 'transfer_masuk.xlsx');
    }
    public function transfer_keluar(){
        return $this->excel->download(new TransferKeluarExport, 'transfer_keluar.xlsx');
    }

    public function tampil(){
        $kategori_barangs = KategoriBarang::all();
        $pembukuans = Pembukuan::whereBetween('tgl_pembukuan', [date('2019-31-12'), date('2020-30-06')])->get();
        return view('exports.rincian_barang', compact('kategori_barangs','pembukuans'));
    }
}
