<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class etelMento extends Authenticatable
{
    use HasFactory;

    protected $table = 'etelmento';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'emailCim',
        'jelszo',
        'diabetesz',
        'longitude',
        'latitude',
        'mogyoroAllergia',
        'halAllergia',
        'tojasAllergia',
        'laktozErzekenyseg',
        'szojaAllergia',
        'glutenErzekenyseg',
        'olaszKonyha',
        'gorogKonyha',
        'amerikaiKonyha',
        'mexikoiKonyha',
        'magyarKonyha',
        'japanKonyha',
        'szimplaEtrend',
        'vegetarianusEtrend',
        'veganEtrend'
    ];
}
