<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\etelFelajanlas;
use App\Http\Requests\foodRequest;

class etelFelajanlasController extends Controller
{
    public function showFood(foodRequest $request){
        return etelFelajanlas::all();
    }
    public function createFood(foodRequest $request){
        try {
            $etelFelajanlas = etelFelajanlas::create([
                'nev' => $request->input('name'),
                'típus' => $request->input('type'),
                'lejaratiDatum' => $request->input('expirationDate'),
                'helybenFogyaszthato' => $request->input('consumption'),
                'mogyoroAllergia' => $request->input('mogyoroAllergia'),
                'halAllergia' => $request->input('halAllergia'),
                'tojasAllergia' => $request->input('tojasAllergia'),
                'szojaAllergia' => $request->input('szojaAllergia'),
                'konyhaJelleg' => $request->input('cousine')
                
            ]);
        } catch (Exception $e) {
            return response()->json(['message'=>$e], 400);
        }
    }
}
