<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
      
        return view('employee');
    }


    public function EmployeeBan(Request $req, $id)
    {
        Employee::find($id)->ban([
            'comment' => 'Enjoy your ban!',
        ]);

    }
    public function EmployeeUnban($id)
    {
        Employee::find($id)->unban();
    }
}
