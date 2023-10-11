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
        'mogyoroAllergia',
        'halAllergia',
        'tojasAllergia',
        'szojaAllergia',
        'cousine',
        'típus',
        'helybenFogyaszthato',
        'lejaratiDatum'
    ];
}
