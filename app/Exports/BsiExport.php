<?php

namespace App\Exports;

use App\Models\Bsi;
use Maatwebsite\Excel\Concerns\FromCollection;

class BsiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bsi::all();
    }
}
