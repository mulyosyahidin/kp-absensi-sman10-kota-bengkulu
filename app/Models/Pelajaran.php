<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pelajaran';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'nama',
        'tingkat',
        'jenis',
    ];

    /**
     * Timestamps are not used in this model.
     * 
     * @var bool
     */
    public $timestamps = false;
}
