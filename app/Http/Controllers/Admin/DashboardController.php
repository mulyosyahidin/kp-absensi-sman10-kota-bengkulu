<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'jurusan' => \App\Models\Jurusan::count(),
            'kelas' => \App\Models\Kelas::count(),
            'guru' => \App\Models\Guru::count(),
            'siswa' => \App\Models\Siswa::count(),
            'pelajaran' => \App\Models\Pelajaran::count(),
            'absensi' => \App\Models\Absensi::count(),
        ];

        return view('admin.dashboard', compact('count'));
    }
}
