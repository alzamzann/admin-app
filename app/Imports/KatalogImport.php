<?php

namespace App\Imports;

use App\Models\Katalog;
use Maatwebsite\Excel\Concerns\ToModel;

class KatalogImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Katalog([
            'namaBarang' => $row[1],
            'deskripsi' => $row[2],
            'harga' => $row[3],
            'foto' => $row[4]
        ]);
    }
}
