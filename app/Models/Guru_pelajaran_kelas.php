<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru_pelajaran_kelas extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'guru_pelajaran_kelas';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_guru_pelajaran',
        'id_kelas',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

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
     * Get the guru pelajaran that owns the kelas.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guruPelajaran()
    {
        return $this->belongsTo(Guru_pelajaran::class, 'id_guru_pelajaran');
    }
}
