<?php

namespace App\Http\Controllers;

use App\Exports\BsiExport;
use App\Exports\DocumentExport;
use App\Exports\InfraExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportFileController extends Controller
{
    // function export excel document data
    public function DocExportExcel(){
         return Excel::download(new DocumentExport, 'Data Arsip Dokumen.xlsx');
    }

    // function export excel bsi data
    public function BsiExportExcel(){
         return Excel::download(new BsiExport, 'Pendataan Bali Smart Island`.xlsx');
    }

     // function export excel Infrastructure data
     public function InfraExportExcel(){
          return Excel::download(new InfraExport, 'Pendataan Infrastruktur`.xlsx');
     }
}