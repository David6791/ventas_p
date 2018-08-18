<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::where('name', '=', 'Joaquin Manrique')->first();
        //return dd($user->hasRole('super_admin'));
        //return $user;
        return view('home');
    }
}
