<?php

namespace App\Exports;

use App\Models\Infrastructure;
use Maatwebsite\Excel\Concerns\FromCollection;

class InfraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Infrastructure::all();
    }
}
