<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kelas_siswa;
use App\Imports\SiswaImport;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::paginate();

        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'nullable|unique:siswa,nis|max:4',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable',
            'alamat' => 'nullable',
        ]);

        Siswa::create($request->all());

        return redirect()
            ->route('admin.siswa.index')
            ->withSuccess('Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'nullable|numeric|unique:siswa,nis,' . $siswa->id,
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable',
            'alamat' => 'nullable',
        ]);

        $siswa->update($request->all());

        return redirect()
            ->route('admin.siswa.show', $siswa)
            ->withSuccess('Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->withSuccess('Siswa berhasil dihapus.');
    }

    /**
     * Update kelas siswa
     * 
     * @param \App\Models\Siswa $siswa
     * @return \Illuminate\Http\Response
     */
    public function kelas(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $tahunAjaran = Tahun_ajaran::where('aktif', true)->first();

        return view('admin.siswa.kelas', compact('siswa', 'kelas', 'tahunAjaran'));
    }

    /**
     * Update kelas siswa
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Siswa $siswa
     * @return \Illuminate\Http\Response
     */
    public function updateKelas(Request $request, Siswa $siswa)
    {
        $tahunAjaran = Tahun_ajaran::where('aktif', true)->first();

        $kelas = Kelas_siswa::where('id_siswa', $siswa->id)
            ->where('id_tahun_ajaran', $tahunAjaran->id)
            ->first();

        if ($kelas) {
            $kelas->update([
                'id_kelas' => $request->id_kelas,
            ]);
        } else {
            Kelas_siswa::create([
                'id_siswa' => $siswa->id,
                'id_kelas' => $request->id_kelas,
                'id_tahun_ajaran' => $tahunAjaran->id,
                'aktif' => true,
            ]);
        }

        return redirect()
            ->route('admin.siswa.show', $siswa)
            ->withSuccess('Kelas berhasil diperbarui.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new SiswaImport, $file);

        return redirect()
            ->route('admin.siswa.index')
            ->withSuccess('Data siswa berhasil diimport.');
    }
}