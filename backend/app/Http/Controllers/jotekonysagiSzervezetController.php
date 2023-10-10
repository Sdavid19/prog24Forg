<?php

namespace App\Http\Controllers;

use App\Http\Requests\charityLoginRequest;
use App\Http\Requests\charityPatchRequest;
use App\Http\Requests\registrationCharityRequest;
use App\Models\jotekonysagiSzervezet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jotekonysagiSzervezetController extends Controller
{
    public function index()
    {
        return jotekonysagiSzervezet::all();
    }

    public function store(registrationCharityRequest $request)
    {
        try {
            $jotekonysagiSzervezet =  jotekonysagiSzervezet::create([
                'nev' => $request->input('name'),
                'emailCim' => $request->input('email'),
                'jelszo' => $request->input('password'),
                'geolokaciosCim' => $request->input('geolocation')
            ]);
            return response()->json(['message'=>'ok '], 200);
            /*Auth::login($jotekonysagiSzervezet);
            {
                return redirect()->route('user.profil');
            }*/
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'A regisztráció sikertelen! Kérjük próbálja újra később.')->setStatusCode(422);
        }
    }
    public function update(charityPatchRequest $request, $id)
    {
        try {
            if (jotekonysagiSzervezet::find($id)->exists()) {
                $etelMento = jotekonysagiSzervezet::find($id);
                $etelMento->update($request->all());
                
                return response()->json(['message'=>'Adatai frissítve lettek, id: '.$id], 200);
            }
            else {
                return response()->json(['message'=>'Nem találtuk a szervezetet, id: '.$id], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message'=>'Adatbázis hiba'], 400);
        }
    }

    public function loginRequest(charityLoginRequest $request)
    {
        session()->flush();

        $name = $request->input('name', null);
        $password = $request->input('password', null);

        $user = jotekonysagiSzervezet::all()->firstWhere('nev', '=', $name);
        if (!$user || !($user->jelszo == $password)) {
            return response()->json([
                'success' => false,
                'message' => 'Az ön által megadott adatok nem helyesek!'
            ], 400);
        }
        Auth::login($user);

        return response()->json(Auth::user(), 200);
    }
}
