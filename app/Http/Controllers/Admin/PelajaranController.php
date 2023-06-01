<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

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
            'jenis' => 'required|string|max:255|in:umum,jurusan',
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
            'jenis' => 'required|string|max:255|in:umum,jurusan',
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
}
