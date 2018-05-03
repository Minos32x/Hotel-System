<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeLoginController extends Controller


{

    public function __construct()
    {
        $this->middleware(['guest:employee', 'forbid-banned-user'])->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    public function login(Request $request)
    {
        //validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
                //attempt to log the employee in 
       if  (Auth::guard('employee')->attempt(['email'=>$request['email'],'password'=>$request['password']],$request->remember))
       {
                return redirect()->intended(route('admin'));
       }
        //if sucsses insert the employee in the session 
        return redirect()->back()->withInput($request->only('email,remeber'));
    }

    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();
        $request->session()->invalidate();        
        return redirect('/');
        
    }
}
