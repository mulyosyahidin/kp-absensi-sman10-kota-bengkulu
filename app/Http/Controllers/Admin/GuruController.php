<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::paginate();

        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username|min:4',
            'email' => 'required|unique:users,email|email|min:12',
            'password' => 'required|min:8',
            'nip' => 'nullable|unique:guru,nip',
            'nuptk' => 'nullable|unique:guru,nuptk',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable',
            'alamat' => 'nullable',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->nama,
            'role' => 'guru',
            'password' => Hash::make($request->password),
        ]);

        Guru::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nuptk' => $request->nuptk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('admin.guru.index')
            ->withSuccess('Berhasil menambahkan guru baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'nullable|unique:guru,nip,' . $guru->id,
            'nuptk' => 'nullable|unique:guru,nuptk,' . $guru->id,
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable',
            'alamat' => 'nullable',
        ]);

        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nuptk' => $request->nuptk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('admin.guru.show', $guru)
            ->withSuccess('Berhasil memperbarui data guru.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->user()->delete();

        return redirect()
            ->route('admin.guru.index')
            ->withSuccess('Berhasil menghapus guru.');
    }
}
