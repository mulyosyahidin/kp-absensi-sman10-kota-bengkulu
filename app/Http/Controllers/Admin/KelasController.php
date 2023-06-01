<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('jurusan')->get();

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
        ]);

        Kelas::create([
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
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()
            ->route('admin.kelas.index')
            ->withSuccess('Kelas berhasil dihapus.');
    }
}
