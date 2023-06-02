<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru_pelajaran extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'guru_pelajaran';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_tahun_ajaran',
        'id_guru',
        'id_pelajaran',
        'id_kelas',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the tahun ajaran that owns the guru pelajaran.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahunAjaran()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'id_tahun_ajaran');
    }

    /**
     * Get the guru that owns the guru pelajaran.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    /**
     * Get the pelajaran that owns the guru pelajaran.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran');
    }

    /**
     * Get the kelas that owns the guru pelajaran.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    /**
     * Kelas yang diajar oleh guru pada pelajaran tertentu
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guruKelas()
    {
        return $this->hasMany(Guru_pelajaran_kelas::class, 'id_guru_pelajaran');
    }
}
