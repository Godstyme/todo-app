<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
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
        $userValidate = $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $credentials = Auth::attempt($request->only('email', 'password'));
        if ($credentials) {
            return redirect()->route('home')->with("message","You have Successfully logged in");
        } else {
            return redirect("login")->with("error",'Oppes! You have entered invalid credentials');
        }

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
