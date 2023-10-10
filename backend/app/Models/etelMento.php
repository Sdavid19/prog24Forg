<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etelMento extends Model
{
    use HasFactory;

    protected $table = 'etelmento';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'emailCim',
        'jelszo',
        'geolokaciosCim',
        'etrend',
        'konyhaPreferencia',
        'diabetesz',
        'etelIntolerancia',
        'etelAllergia'
    ];
}
