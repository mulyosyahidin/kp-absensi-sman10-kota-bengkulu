<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tahun_ajaran;
use App\Models\Wali_kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('jurusan', 'waliKelas', 'waliKelas.guru')->get();

        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();

        return view('admin.kelas.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jurusan' => 'required|exists:jurusan,id',
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|integer|min:1|max:3',
            'id_guru' => 'nullable|exists:guru,id',
        ]);

        $kelas = Kelas::create([
            'id_jurusan' => $request->id_jurusan,
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
        ]);

        return redirect()
            ->route('admin.kelas.index')
            ->withSuccess('Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        $kela->load([
            'waliKelas', 'waliKelas.guru', 'waliKelas.tahunAjaran',
        ]);

        return view('admin.kelas.show', compact('kela'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        $jurusan = Jurusan::all();

        return view('admin.kelas.edit', compact('kela', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'id_jurusan' => 'required|exists:jurusan,id',
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|integer|min:1|max:3',
        ]);

        $kela->update([
            'id_jurusan' => $request->id_jurusan,
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
        ]);

        return redirect()
            ->route('admin.kelas.show', $kela)
            ->withSuccess('Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()
            ->route('admin.kelas.index')
            ->withSuccess('Kelas berhasil dihapus.');
    }

    public function waliKelas(Kelas $kela)
    {
        $guru = Guru::all();
        $tahunAjaran = Tahun_ajaran::all();

        return view('admin.kelas.wali-kelas', compact('kela', 'guru', 'tahunAjaran'));
    }

    public function updateWaliKelas(Request $request, Kelas $kela)
    {
        $request->validate([
            'id_tahun_ajaran' => 'required|exists:tahun_ajaran,id',
            'id_guru' => 'required|exists:guru,id',
        ]);

        $waliKelas = Wali_kelas::where('id_tahun_ajaran', $request->id_tahun_ajaran)
            ->where('id_kelas', $kela->id)
            ->exists();

        if ($waliKelas) {
            $isGuruWaliKelas = Wali_kelas::where('id_tahun_ajaran', $request->id_tahun_ajaran)
                ->where('id_kelas', $kela->id)
                ->where('id_guru', $request->id_guru)
                ->exists();

            if (!$isGuruWaliKelas) {
                Wali_kelas::where('id_tahun_ajaran', $request->id_tahun_ajaran)
                    ->where('id_kelas', $kela->id)
                    ->update([
                        'aktif' => false,
                    ]);

                Wali_kelas::create([
                    'id_tahun_ajaran' => $request->id_tahun_ajaran,
                    'id_kelas' => $kela->id,
                    'id_guru' => $request->id_guru,
                    'aktif' => true,
                ]);
            }
        } else {
            Wali_kelas::where('id_kelas', $kela->id)
                ->update([
                    'aktif' => false,
                ]);

            Wali_kelas::create([
                'id_tahun_ajaran' => $request->id_tahun_ajaran,
                'id_kelas' => $kela->id,
                'id_guru' => $request->id_guru,
                'aktif' => true,
            ]);
        }

        return redirect()
            ->route('admin.kelas.show', $kela)
            ->withSuccess('Wali kelas berhasil diperbarui.');
    }
}
