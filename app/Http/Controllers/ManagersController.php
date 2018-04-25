<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Employee;
use Rinvex\Country\Models\Country;


use Illuminate\Http\Request;
use App\DataTables\employeeTableDataTable;

class ManagersController extends Controller
{
    public function index()
    {
        $emp = new employeeTableDataTable( DB::table('employees')->where('type', 'manager'));
        return $emp->render('Admin.emp');

    }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = countries();

        return view('manager.create',['countries' => $countries]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Employee::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'national_id'=>$request->national_id,
            'country'=> $request->country,
            'last_login'=>now(),
            'type'=>'manager',
            'avatar'=>''
           
        ]);
        
         return redirect('/managers'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = countries();

        return view('manager.edit',[
            'countries' => $countries,
            'manager' => Employee::find($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $manager->update($request->all());
        Employee::where('id', $id)->update(['name' => $request->name,
            'email' => $request->email,
             'national_id' => $request->national_id,
            
        ]);
        return redirect('/managers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id' , $id)->delete(); 
        return redirect('/managers');
    }
}
