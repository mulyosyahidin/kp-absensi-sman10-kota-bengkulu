<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'absensi';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_tahun_ajaran',
        'id_guru',
        'id_kelas',
        'id_pelajaran',
        'tanggal',
        'judul',
        'deskripsi',
        'pertemuan_ke',
        'status',
    ];

    /**
     * The attributes that should be cast.
     * 
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date:Y-m-d'
    ];

    /**
     * Pelajaran yang diabsensikan
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran');
    }

    /**
     * Guru yang melakukan absensi
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    /**
     * Kelas dimana absensi dilakukan
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function dataAbsensi()
    {
        return $this->hasMany(Absensi_siswa::class, 'id_absensi');
    }
}
