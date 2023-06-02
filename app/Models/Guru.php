<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'guru';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'nuptk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     * 
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date:Y-m-d'
    ];

    /**
     * Get the user that owns the guru.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Wali kelas data associated with the guru.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function waliKelas()
    {
        return $this->hasMany(Wali_kelas::class, 'id_guru', 'id');
    }
}
