<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru_pelajaran_kelas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            ->get();

        return view('guru.kelas.index', compact('kelas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        $kela->load('siswa.tahunAjaran', 'siswa.siswa', 'pelajaran.guruPelajaran', 'pelajaran.guruPelajaran.pelajaran');

        return view('guru.kelas.show', compact('kela'));
    }
}
