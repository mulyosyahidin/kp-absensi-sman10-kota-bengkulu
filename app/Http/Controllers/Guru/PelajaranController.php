<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru_pelajaran;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajaran = Guru_pelajaran::where('id_guru', auth()->user()->guru->id)
            ->where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->with('pelajaran')
            ->get();

        return view('guru.pelajaran.index', compact('pelajaran'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajaran $pelajaran)
    {
        $pelajaran->load('guru.pelajaran', 'guru.kelas', 'guru.guruKelas.kelas');

        return view('guru.pelajaran.show', compact('pelajaran'));
    }
}
