<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = Tahun_ajaran::all();

        return view('admin.tahun-ajaran.index', compact('tahunAjaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tahun-ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:1,2',
            'tanggal_mulai' => 'required|date|before:tanggal_selesai',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:1,2',
        ]);

        $tahunAjaran = Tahun_ajaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'aktif' => $request->status == 1,
        ]);

        if ($tahunAjaran->aktif) {
            Tahun_ajaran::where('id', '!=', $tahunAjaran->id)
                ->update(['aktif' => false]);
        }

        return redirect()
            ->route('admin.tahun-ajaran.index')
            ->withSuccess('Tahun ajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tahun_ajaran $tahun_ajaran)
    {
        return view('admin.tahun-ajaran.show', compact('tahun_ajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tahun_ajaran $tahun_ajaran)
    {
        return view('admin.tahun-ajaran.edit', compact('tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tahun_ajaran $tahun_ajaran)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:1,2',
            'tanggal_mulai' => 'required|date|before:tanggal_selesai',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:1,2',
        ]);

        $tahun_ajaran->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'aktif' => $request->status == 1,
        ]);

        if ($tahun_ajaran->aktif) {
            Tahun_ajaran::where('id', '!=', $tahun_ajaran->id)
                ->update(['aktif' => false]);
        }

        return redirect()
            ->route('admin.tahun-ajaran.index')
            ->withSuccess('Tahun ajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tahun_ajaran $tahun_ajaran)
    {
        $tahun_ajaran->delete();

        return redirect()
            ->route('admin.tahun-ajaran.index')
            ->withSuccess('Tahun ajaran berhasil dihapus');
    }
}
