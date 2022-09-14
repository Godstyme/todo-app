<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Login a  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'name' =>   'required|string|min:5|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|min:8'
        ]);
        !Auth::attempt($request->only('email', 'password'));
    }


    /**
     *Logout from resource  storage.
     *Redirect user to the login page
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // Session::flush();

        Auth::logout();
        return redirect('login');
    }
}
