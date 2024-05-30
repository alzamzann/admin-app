<?php

namespace App\Exports;

use App\Models\Katalog;
use Maatwebsite\Excel\Concerns\FromCollection;

class KatalogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Katalog::all();
    }
}
