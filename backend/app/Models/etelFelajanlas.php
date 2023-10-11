<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etelFelajanlas extends Model
{
    use HasFactory;
    protected $table = 'etel_felajanlas';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'nev',
        'mennyiseg',
        'mertekegyseg',
        'diabetesz',
        'mogyoroAllergia',
        'halAllergia',
        'tojasAllergia',
        'szojaAllergia',
        'laktozErzekenyseg',
        'glutenErzekenyseg',
        'olaszKonyha',
        'gorogKonyha',
        'amerikaiKonyha',
        'mexikoiKonyha',
        'magyarKonyha',
        'japanKonyha',
        'tejTermek',
        'pekaru',
        'melegitendo',
        'helybenFogyaszthato',
        'lejaratiIdo',
        'kepUrl',
        'konyhaTipus'
    ];
}
