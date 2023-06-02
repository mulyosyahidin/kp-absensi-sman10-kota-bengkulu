<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'jurusan';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'nama',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all of the kelas for the jurusan.
     */
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_jurusan');
    }
}
