<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali_kelas extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'wali_kelas';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_guru',
        'id_kelas',
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
     * Get the guru that owns the wali kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    /**
     * Get the kelas that owns the wali kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    /**
     * Get the tahun ajaran that owns the wali kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahunAjaran()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'id_tahun_ajaran');
    }
}
