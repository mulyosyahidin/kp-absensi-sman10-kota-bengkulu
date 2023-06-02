<?php

namespace App\Exports\Guru;

use App\Models\Kelas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanKelasExport implements WithMultipleSheets
{
    protected $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function sheets(): array
    {
        $sheets = [];

        $this->kelas->load('pelajaran.guruPelajaran', 'pelajaran.guruPelajaran.pelajaran', 'pelajaran.kelas', 'pelajaran.kelas.siswa.siswa');
        $pelajaran = $this->kelas->pelajaran->where('guruPelajaran.id_guru', auth()->user()->guru->id);
        
        foreach ($pelajaran as $item) {
            $sheets[] = new PelajaranExport($item);
        }

        return $sheets;
    }
}
