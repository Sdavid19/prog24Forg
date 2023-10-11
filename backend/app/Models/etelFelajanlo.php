<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class etelFelajanlo extends Authenticatable
{
    use HasFactory;
    protected $table = 'etel_felajanlo';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'emailCim',
        'jelszo',
        'geolokaciosCim',
        'letesitmenyFajta',
        'konyhaJelleg'
    ];
}
