<?php

namespace App\Http\Controllers\Guru;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru_pelajaran_kelas;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Guru\LaporanKelasExport;

class LaporanController extends Controller
{
    public function index()
    {
        $kelas = Guru_pelajaran_kelas::select('id_kelas')
            ->with('kelas', 'kelas.siswa', 'kelas.pelajaran', 'guruPelajaran', 'kelas.pelajaran.guruPelajaran', 'kelas.pelajaran.guruPelajaran.pelajaran')
            ->whereHas('guruPelajaran', function ($query) {
                $query->where('id_guru', auth()->user()->guru->id);
            })
            ->groupBy('id_kelas')
            ->orderBy(function ($query) {
                $query->select('nama')
                    ->from('kelas')
                    ->whereColumn('kelas.id', 'guru_pelajaran_kelas.id_kelas')
                    ->orderBy('nama', 'asc')
                    ->limit(1);
            })
            ->get();

        return view('guru.laporan.index', compact('kelas'));
    }

    public function downloadLaporanKelas(Kelas $kelas)
    {
        return Excel::download(new LaporanKelasExport($kelas), 'Laporan Absensi Kelas ' . $kelas->nama . ' - ' . time() . '.xlsx');
    }
}
