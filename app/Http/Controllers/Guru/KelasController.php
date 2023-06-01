<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru_pelajaran;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Guru_pelajaran::where('id_guru', auth()->user()->guru->id)
            ->where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->with('kelas', 'kelas.jurusan')
            ->get();

        return view('guru.kelas.index', compact('kelas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        $kela->load('siswa.tahunAjaran', 'siswa.siswa');

        return view('guru.kelas.show', compact('kela'));
    }
}
