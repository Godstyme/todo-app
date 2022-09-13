<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Registration extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('registration');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>   'required|string|min:5|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|min:8'
        ]);
        $validateUser = new User;
        $validateUser->name = $request->name;
        $validateUser->email = $request->email;
        $validateUser->password = Hash::make($request->password);
        $result = $validateUser->save();
        if ($result) {
            Auth::login($validateUser);
            return redirect()->route('home')->with("message","You have successfully register");
        } else {
            return back();
        }

    }


}
