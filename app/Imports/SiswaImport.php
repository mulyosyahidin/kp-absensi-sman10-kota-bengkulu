<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nis = $row['nis'];
        $nama = $row['nama'];
        $jenisKelamin = $row['kelamin'];

        $cek = Siswa::where('nis', $nis)->first();

        if ($cek) {
            return null;
        }

        return new Siswa([
            'nis' => $nis,
            'nama' => $nama,
            'jenis_kelamin' => $jenisKelamin,
        ]);
    }
}
