<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginProses(Request $request)
    {
        $token = Http::post('https://kedairona.000webhostapp.com/api/token', [
            'client_key' => 'clientKeyCMS',
            'secret_key' => 'secret',
        ]);

        $result = $token->json();

        // dd($result);

        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required|string|min:4',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$result['data']['token'],
            'Accept' => 'application/json',
        ])->post('https://kedairona.000webhostapp.com/api/cms/login', [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        // dd($response->json());

        if(!$response){
            return redirect()->back()->with('error', $response->json()['message']);
        }else{
            Session::put('auth', $response->json()['data']['token']);
            return redirect()->intended('dashboard');
        }
        

    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $userController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $userController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $userController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $userController)
    {
        //
    }
}
