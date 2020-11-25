<?php

namespace App\Http\Controllers;

use App\Persediaan;
use App\Exports\SaldoAwalExport;
use App\Exports\PembelianExport;
use App\Exports\TransferMasukExport;
use App\Exports\TransferKeluarExport;
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

    // public function tampil(){
    //     $persediaans = Persediaan::where('jenis_persediaan_id', '4')->get();
    //     return view('exports.transfer_keluar', compact('persediaans'));
    // }
}
