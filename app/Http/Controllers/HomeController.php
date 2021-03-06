<?php

namespace App\Http\Controllers;

use Rinvex\Country\Models\Country;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

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

    public function welcome()
    {
        $countries = countries();
        return view('welcome', ['countries' => $countries]);
    }


}
