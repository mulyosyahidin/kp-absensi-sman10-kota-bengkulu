<?php

namespace App\Imports;

use App\Models\Pelajaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelajaranImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nama = $row['nama'];
        $tingkat = $row['kelas'];

        return new Pelajaran([
            'nama' => $nama,
            'tingkat' => $tingkat,
        ]);
    }
}
