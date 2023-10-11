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
        $rawJson = json_decode($request->input);

        $foodAllergy = implode($rawJson->allergies);
        $dietary = implode($rawJson->diet);
        $cuisinePreference = implode($rawJson->preferences);
        $foodIntolerance = implode($rawJson->intolerances);

        try {
            $etelMento =  etelMento::create([
                'nev' => $rawJson('name'),
                'emailCim' => $rawJson('email'),
                'jelszo' => $rawJson('password'),
                'geolokaciosCim' => $rawJson('geolocation'),
                'etrend' => ($dietary),
                'konyhaPreferencia' => ($cuisinePreference),
                'diabetesz' => $rawJson('diabetes'),
                'etelIntolerancia' => ($foodIntolerance),
                'etelAllergia' => ($foodAllergy)
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
