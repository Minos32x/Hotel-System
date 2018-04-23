<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rinvex\Country\Models\Country;
use Spatie\Permission\Traits\HasRoles;



class HomeController extends Controller
{
    use HasRoles;
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
        return view('home');
    }

    public function country()
    {

        $countries = countries();
        return view('welcome', ['countries' => $countries]);
    }



}
