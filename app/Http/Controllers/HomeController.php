<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id()){
            $is_admin = Auth()->user()->is_admin;

            if($is_admin=='1'){
                return view('dashboard');
            }
            else{
                return view('home');
            }
        }
        return back()->with('loginError', 'Gagal Masuk !');
    }
}
