<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etelFelajanlo extends Model
{
    use HasFactory;
    protected $table = 'etel_felajanlo';
    protected $primaryKey = 'ID';
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
