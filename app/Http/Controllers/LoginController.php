<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect(RouteServiceProvider::HOME);
        }

        return back()->withInput()->with('error', 'Invalid Credentials');
    }
}
