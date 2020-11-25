<?php

namespace App\Exports;

use App\Persediaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SaldoAwalExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.persediaan_masuk', [
            'persediaans' => Persediaan::where('jenis_persediaan_id', '1')->get()
        ]);
    }
}
