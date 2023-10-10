<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class jotekonysagiSzervezet extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'jotekonysagi_szerv';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'emailCim',
        'jelszo',
        'geolokaciosCim'
    ];
}
