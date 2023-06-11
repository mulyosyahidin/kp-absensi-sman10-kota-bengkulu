<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use App\Models\Guru_pelajaran;
use App\Http\Controllers\Controller;
use App\Imports\PelajaranImport;
use Maatwebsite\Excel\Facades\Excel;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajaran = Pelajaran::all();

        return view('admin.pelajaran.index', compact('pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        Pelajaran::create($request->all());

        return redirect()
            ->route('admin.pelajaran.index')
            ->withSuccess('Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajaran $pelajaran)
    {
        $pelajaran->load('guru', 'guru.guru', 'guru.tahunAjaran', 'guru.kelas', 'guru.guruKelas.kelas');

        return view('admin.pelajaran.show', compact('pelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelajaran $pelajaran)
    {
        return view('admin.pelajaran.edit', compact('pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelajaran $pelajaran)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        $pelajaran->update($request->all());

        return redirect()
            ->route('admin.pelajaran.index')
            ->withSuccess('Pelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajaran $pelajaran)
    {
        $pelajaran->delete();

        return redirect()
            ->route('admin.pelajaran.index')
            ->withSuccess('Pelajaran berhasil dihapus');
    }

    /**
     * Tambah guru pelajaran.
     * 
     * @param Pelajaran $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function guru(Pelajaran $pelajaran)
    {
        $pelajaran->load('guru.kelas', 'guru.guruKelas');

        $guru = Guru::all();
        $kelas = Kelas::where('tingkat', $pelajaran->tingkat)->get();

        $dataGuruPengampu = [];
        $kelasSudahDiampu = [];

        foreach ($pelajaran->guru as $guruPelajaran) {
            $dataGuruPengampu[] = [
                'id_guru' => $guruPelajaran->id_guru,
                'kelas' => $guruPelajaran->guruKelas->map(function ($item) {
                    return $item->id_kelas;
                })->toArray(),
            ];

            $kelasSudahDiampu = array_merge($kelasSudahDiampu, $guruPelajaran->guruKelas->map(function ($item) {
                return $item->id_kelas;
            })->toArray());
        }

        $dataGuruPengampu = collect($dataGuruPengampu);
        
        return view('admin.pelajaran.guru', compact('pelajaran', 'guru', 'kelas', 'dataGuruPengampu', 'kelasSudahDiampu'));
    }

    /**
     * Tambah guru pelajaran.
     * 
     * @param Pelajaran $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function updateGuru(Request $request, Pelajaran $pelajaran)
    {
        $request->validate([
            'id_guru' => 'required|exists:guru,id',
            'kelas' => 'required|array',
        ]);

        $tahunAjaranAktif = Tahun_ajaran::where('aktif', true)->first();

        $guruPelajaran = Guru_pelajaran::create([
            'id_tahun_ajaran' => $tahunAjaranAktif->id,
            'id_guru' => $request->id_guru,
            'id_pelajaran' => $pelajaran->id,
        ]);

        foreach ($request->kelas as $idKelas) {
            $guruPelajaran->guruKelas()->create([
                'id_kelas' => $idKelas,
            ]);
        }

        return redirect()
            ->route('admin.pelajaran.show', $pelajaran)
            ->withSuccess('Berhasil menambah guru pelajaran');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new PelajaranImport, $file);

        return redirect()
            ->route('admin.pelajaran.index')
            ->withSuccess('Data pelajaran berhasil diimport.');
    }

    public function hapusGuru(Pelajaran $pelajaran, Guru $guru)
    {
        $pelajaran->guru()->where('id_guru', $guru->id)->delete();

        return redirect()
            ->route('admin.pelajaran.show', $pelajaran)
            ->withSuccess('Berhasil menghapus guru pelajaran');
    }
}
