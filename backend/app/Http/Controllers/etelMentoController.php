<?php

namespace App\Http\Controllers;

use App\Http\Requests\registrationUserRequest;
use App\Http\Requests\userLoginRequest;
use App\Http\Requests\userPatchRequest;
use App\Models\etelMento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class etelMentoController extends Controller
{
    public function index()
    {
        return etelMento::all();
    }
    public function store(registrationUserRequest $request)
    {
        try {
            $etelMento =  etelMento::create([
                'nev' => $request->input('name'),
                'emailCim' => $request->input('email'),
                'jelszo' => $request->input('password'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'diabetesz' => $request->input('diabetes'),
                'mogyoroAllergia' => $request->input('mogyoroAllergia'),
                'halAllergia' => $request->input('halAllergia'),
                'tojasAllergia' => $request->input('tojasAllergia'),
                'laktozErzekenyseg' => $request->input('laktozErzekenyseg'),
                'glutenErzekenyseg' => $request->input('glutenErzekenyseg'),
                'olaszKonyha' => $request->input('olaszKonyha'),
                'gorogKonyha' => $request->input('gorogKonyha'),
                'amerikaiKonyha' => $request->input('amerikaiKonyha'),
                'mexikoiKonyha' => $request->input('mexikoiKonyha'),
                'magyarKonyha' => $request->input('magyarKonyha'),
                'japanKonyha' => $request->input('japanKonyha'),
                'szimplaEtrend' => $request->input('szimplaEtrend'),
                'vegetarianusEtrend' => $request->input('vegetarianusEtrend'),
                'veganEtrend' => $request->input('veganEtrend')
            ]);
            return response()->json(['message'=>'ok '], 200);
            // Auth::login($etelMento);
            // {
            //     return redirect()->route('user.profil');
            // }
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'A regisztráció sikertelen! Kérjük próbálja újra később.')->setStatusCode(422);
        }
    }

    public function update(userPatchRequest $request, $id)
    {
        try {
            if (etelMento::find($id)->exists()) {
                $etelMento = etelMento::find($id);
                $etelMento->update($request->all());
                
                return response()->json(['message'=>'Adatai frissítve lettek, id: '.$id], 200);
            }
            else {
                return response()->json(['message'=>'Nem találtuk a felhasználót, id: '.$id], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message'=>'Adatbázis hiba'], 400);
        }
    }

    public function loginRequest(userLoginRequest $request)
    {
        session()->flush();

        $email = $request->input('email', null);
        $password = $request->input('password', null);

        $user = etelMento::all()->firstWhere('emailCim', '=', $email);
        if (!$user || !($user->jelszo == $password)) {
            return response()->json([
                'success' => false,
                'message' => 'Az ön által megadott adatok nem helyesek!'
            ], 400);
        }
        Auth::guard('etelmento')->loginUsingId($user->id);
    }
}
