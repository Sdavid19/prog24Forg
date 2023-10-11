<?php

namespace App\Http\Controllers;

use App\Http\Requests\advertiserLoginRequest;
use App\Http\Requests\advertiserPatchRequest;
use App\Http\Requests\registrationAdvertiserRequest;
use App\Models\etelFelajanlo;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class etelFelajanloController extends Controller
{
    public function index()
    {
        return etelFelajanlo::all();
    }
    
    public function store(registrationAdvertiserRequest $request)
    {
        try {
            $etelFelajanlo =  etelFelajanlo::create([
                'nev' => $request->input('name'),
                'emailCim' => $request->input('email'),
                'jelszo' => $request->input('password'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'letesitmenyFajta' => $request->input('establishment'),
                'olaszKonyha' => $request->input('olaszKonyha'),
                'gorogKonyha' => $request->input('gorogKonyha'),
                'amerikaiKonyha' => $request->input('amerikaiKonyha'),
                'mexikoiKonyha' => $request->input('mexikoiKonyha'),
                'magyarKonyha' => $request->input('magyarKonyha'),
                'japanKonyha' => $request->input('japanKonyha')
            ]);
            return response()->json(['message'=>'ok '], 200);
            /*Auth::login($etelFelajanlo);
            {
                return redirect()->route('user.profil');
            }*/
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'A regisztráció sikertelen! Kérjük próbálja újra később.')->setStatusCode(422);
        }
    }
    public function update(advertiserPatchRequest $request, $id)
    {
        try {
            if (etelFelajanlo::find($id)->exists()) {
                $etelMento = etelFelajanlo::find($id);
                $etelMento->update($request->all());
                
                return response()->json(['message'=>'Adatai frissítve lettek, id: '.$id], 200);
            }
            else {
                return response()->json(['message'=>'Nem találtuk a felajánlót, id: '.$id], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message'=>'Adatbázis hiba'], 400);
        }
    }

    /*public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard', 200);
        }

        return back()->withErrors([
            'email' => 'Az ön által szolgáltatott adatok nem egyeznek a rekordjainkkal.',
        ])->onlyInput('email');
    }*/

    public function loginRequest(advertiserLoginRequest $request)
    {
        session()->flush();

        $email = $request->input('email', null);
        $password = $request->input('password', null);

        $user = etelFelajanlo::all()->firstWhere('emailCim', '=', $email);
        if (!$user || !($user->jelszo == $password)) {
            return response()->json([
                'success' => false,
                'message' => 'Az ön által megadott adatok nem helyesek!'
            ], 400);
        }
        Auth::guard('etel_felajanlo')->loginUsingId($user->id);
        

        /*
        $credentials = $request->validate([
            'emailCim' => ['email'],
            'password' => [],
        ]);
        

        if (Auth::guard('etel_felajanlo')->attempt($credentials)) {
            $request->session()->regenerate();

            error_log('you are validated :D');
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Az ön által szolgáltatott adatok nem egyeznek a rekordjainkkal.',
        ])->onlyInput('email');
        */
    }
    
}
