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
            'jenis' => $row[3],
            'harga' => $row[4],
            'foto' => $row[5]
        ]);
    }
}
