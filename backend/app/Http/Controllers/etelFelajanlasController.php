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
                'mennyiseg' => $request->input('mennyiseg'),
                'mertekegyseg' => $request->input('mertekegyseg'),
                'pekaru' => $request->input('pekaru'),
                'tejtermek' => $request->input('tejtermek'),
                'melegitendo' => $request->input('melegitendo'),
                'helybenFogyaszthato' => $request->input('helybenFogyaszthato'),
                'mogyoroAllergia' => $request->input('mogyoroAllergia'),
                'halAllergia' => $request->input('halAllergia'),
                'tojasAllergia' => $request->input('tojasAllergia'),
                'szojaAllergia' => $request->input('szojaAllergia'),
                'laktozErzekenyeg' => $request->input('laktozErzekenyseg'),
                'glutenErzekenyseg' => $request->input('glutenErzekenyseg'),
                'olaszKonyha' => $request->input('olaszKonyha'),
                'gorogKonyha' => $request->input('gorogKonyha'),
                'amerikaiKonyha' => $request->input('amerikaiKonyha'),
                'mexikoiKonyha' => $request->input('mexikoiKonyha'),
                'magyarKonyha' => $request->input('magyarKonyha'),
                'japanKonyha' => $request->input('japanKonyha')
            ]);
        } catch (Exception $e) {
            return response()->json(['message'=>$e], 400);
        }
    }
}
