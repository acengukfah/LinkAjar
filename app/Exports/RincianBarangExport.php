<?php

namespace App\Exports;

use App\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RincianBarangExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.rinican_barang', [
            'barangs' => Barang::all()
        ]);
    }
}
