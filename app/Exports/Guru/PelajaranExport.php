<?php

namespace App\Exports\Guru;

use App\Models\Absensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class PelajaranExport implements FromView, WithTitle, ShouldAutoSize
{
    protected $pelajaran;

    public function __construct($pelajaran)
    {
        $this->pelajaran = $pelajaran;
    }

    public function view(): View
    {
        $absensi = Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->where('id_kelas', $this->pelajaran->kelas->id)
            ->where('id_pelajaran', $this->pelajaran->guruPelajaran->pelajaran->id)
            ->with('dataAbsensi')
            ->get();

        $kelas = $this->pelajaran->kelas;

        return view('guru.laporan.pelajaran-sheet', compact('absensi', 'kelas'));
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->pelajaran->guruPelajaran->pelajaran->nama;
    }
}
