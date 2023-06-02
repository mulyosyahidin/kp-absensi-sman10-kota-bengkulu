<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kelas';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_jurusan',
        'nama',
        'tingkat',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the jurusan that owns the kelas.
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    /**
     * Wali kelas data associated with the kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function waliKelas()
    {
        return $this->hasMany(Wali_kelas::class, 'id_kelas');
    }

    /**
     * Siswa data associated with the kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa()
    {
        return $this->hasMany(Kelas_siswa::class, 'id_kelas');
    }

    /**
     * Guru pelajaran data associated with the kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelajaran()
    {
        return $this->hasMany(Guru_pelajaran_kelas::class, 'id_kelas');
    }
}
