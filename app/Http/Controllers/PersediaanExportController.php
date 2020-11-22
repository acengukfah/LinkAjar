<?php

namespace App\Http\Controllers;

use App\Exports\PersediaanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class PersediaanExportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    public function export(){
        return $this->excel->download(new PersediaanExport, 'testing.xlsx');
    }
}
