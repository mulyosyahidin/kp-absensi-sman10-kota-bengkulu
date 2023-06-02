<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru_pelajaran;
use App\Models\Guru_pelajaran_kelas;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Guru_pelajaran_kelas::select('id_kelas')
            ->with('guruPelajaran', 'kelas', 'kelas.jurusan', 'kelas.siswa', 'kelas.pelajaran', 'kelas.pelajaran.guruPelajaran')
            ->whereHas('guruPelajaran', function ($query) {
                $query->where('id_guru', auth()->user()->guru->id);
            })
            ->groupBy('id_kelas')
            ->orderBy(function ($query) {
                $query->select('nama')
                    ->from('kelas')
                    ->whereColumn('kelas.id', 'guru_pelajaran_kelas.id_kelas')
                    ->orderBy('nama', 'asc')
                    ->limit(1);
            })
            ->get();

        return view('guru.absensi.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //cek apakah ada absensi yang masih draft
        $absensiDraft = Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->where('id_kelas', $request->get('id_kelas'))
            ->where('id_pelajaran', $request->get('id_pelajaran'))
            ->where('status', 'draft')
            ->first();

        if ($absensiDraft) {
            return redirect()
                ->back()
                ->withInfo('Tidak dapat membuat absensi baru, karena masih ada absensi yang belum selesai.');
        }

        $idKelas = $request->get('id_kelas');
        $idPelajaran = $request->get('id_pelajaran');
        $siswa = Kelas::with('siswa')->find($idKelas);

        $pelajaran = Pelajaran::find($idPelajaran);
        $kelas = Kelas::find($idKelas);

        $pertemuan = Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->where('id_kelas', $idKelas)
            ->where('id_pelajaran', $idPelajaran)
            ->count() + 1;

        return view('guru.absensi.create', compact('kelas', 'pelajaran', 'siswa', 'pertemuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pertemuan_ke' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $absensi = Absensi::create([
            'id_tahun_ajaran' => dataTahunAjaranAktif()->id,
            'id_guru' => auth()->user()->guru->id,
            'id_kelas' => $request->get('id_kelas'),
            'id_pelajaran' => $request->get('id_pelajaran'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'pertemuan_ke' => $request->pertemuan_ke,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('guru.absensi.pertemuan', ['kelas' => $absensi->id_kelas, 'pelajaran' => $absensi->id_pelajaran])
            ->withSuccess('Absensi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        $absensi->load('dataAbsensi.siswa');

        $dataGrafik = [
            'hadir' => 0,
            'izin' => 0,
            'sakit' => 0,
            'alpa' => 0,
        ];

        foreach ($absensi->dataAbsensi as $data) {
            $dataGrafik[$data->status]++;
        }

        return view('guru.absensi.show', compact('absensi', 'dataGrafik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        return view('guru.absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pertemuan_ke' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $absensi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'pertemuan_ke' => $request->pertemuan_ke,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('guru.absensi.show', $absensi)
            ->withSuccess('Berhasil memperbarui data absensi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $idKelas = $absensi->id_kelas;
        $idPelajaran = $absensi->id_pelajaran;

        $absensi->delete();

        return redirect()
            ->route('guru.absensi.pertemuan', ['kelas' => $idKelas, 'pelajaran' => $idPelajaran])
            ->withSuccess('Berhasil menghapus data absensi');
    }

    public function pelajaran(Kelas $kelas)
    {
        $kelas->load('pelajaran.guruPelajaran', 'pelajaran.guruPelajaran.pelajaran');

        return view('guru.absensi.pelajaran', compact('kelas'));
    }

    public function pertemuan(Kelas $kelas, Pelajaran $pelajaran)
    {
        $absensi = Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->where('id_kelas', $kelas->id)
            ->where('id_pelajaran', $pelajaran->id)
            ->get();

        return view('guru.absensi.pertemuan', compact('kelas', 'pelajaran', 'absensi'));
    }

    public function absensi(Absensi $absensi)
    {
        $absensi->load('kelas', 'kelas.siswa', 'kelas.siswa.siswa', 'dataAbsensi');

        return view('guru.absensi.absensi', compact('absensi'));
    }

    public function simpanAbsensi(Request $request, Absensi $absensi)
    {
        $request->validate([
            'siswa' => 'required|array',
        ]);

        $absensi->update([
            'status' => 'saved',
        ]);

        $absensi->dataAbsensi()->delete();

        foreach ($request->siswa as $idSiswa => $status) {
            $absensi->dataAbsensi()->create([
                'id_siswa' => $idSiswa,
                'status' => $status,
            ]);
        }

        return redirect()
            ->route('guru.absensi.show', $absensi)
            ->withSuccess('Berhasil menyimpan absensi');
    }

    public function laporan(Kelas $kelas, Pelajaran $pelajaran)
    {
        $absensi = Absensi::where('id_tahun_ajaran', dataTahunAjaranAktif()->id)
            ->where('id_kelas', $kelas->id)
            ->where('id_pelajaran', $pelajaran->id)
            ->with('dataAbsensi')
            ->get();

        $kelas->load('siswa', 'siswa.siswa');


        return view('guru.absensi.laporan', compact('kelas', 'pelajaran', 'absensi'));
    }
}
