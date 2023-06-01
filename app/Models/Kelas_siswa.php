<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas_siswa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kelas_siswa';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_kelas',
        'id_siswa',
        'id_tahun_ajaran',
        'aktif',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the kelas that owns the Kelas_siswa
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    /**
     * Get the siswa that owns the Kelas_siswa
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    /**
     * Get the tahun_ajaran that owns the Kelas_siswa
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahunAjaran()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'id_tahun_ajaran');
    }
}
