<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $guru = auth()->user()->guru;

        return view('guru.profile.edit', compact('guru'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,'. auth()->user()->id .'|min:4',
            'email' => 'required|unique:users,email,'. auth()->user()->id .'|email|min:12',
            'password' => 'nullable|min:8',
            'nip' => 'nullable|unique:guru,nip',
            'nuptk' => 'nullable|unique:guru,nuptk',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable',
            'alamat' => 'nullable',
            'picture' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->nama,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $user->addMediaFromRequest('picture')
                ->toMediaCollection('foto_profil');
        }

        $user->guru()->update([
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
            ->back()
            ->withSuccess('Berhasil memperbarui profil');
    }
}
