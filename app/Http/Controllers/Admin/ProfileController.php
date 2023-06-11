<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8',
            'picture' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        if ($request->hasFile('picture')) {
            if (isset($user->media[0])) {
                $user->media[0]->delete();
            }

            $user->addMediaFromRequest('picture')
                ->toMediaCollection('profile_picture');
        }

        return redirect()
            ->route('admin.profile.edit')
            ->withSuccess('Profile berhasil diperbarui');
    }
}
