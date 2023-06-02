<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru_pelajaran;
use App\Models\Guru_pelajaran_kelas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'pelajaran' => Guru_pelajaran::where('id_guru', auth()->user()->guru->id)->where('id_tahun_ajaran', dataTahunAjaranAktif()->id)->count(),
            'kelas' => Guru_pelajaran_kelas::whereHas('guruPelajaran', function ($query) {
                $query->where('id_guru', auth()->user()->guru->id);
            })->count(),
            'absensi' => Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)->where('id_guru', auth()->user()->guru->id)->count(),
        ];

        $kelas = Guru_pelajaran_kelas::select('id_kelas')
            ->with('guruPelajaran', 'kelas', 'kelas.jurusan')
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
            ->take(5)
            ->get();

        $absensi = Absensi::with('kelas')
            ->take(5)
            ->latest()
            ->get();

        return view('guru.dashboard', compact('count', 'kelas', 'absensi'));
    }
}
