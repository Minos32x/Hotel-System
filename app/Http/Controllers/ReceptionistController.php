<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Employee;
use Illuminate\Http\Request;
use App\DataTables\employeeTableDataTable;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $flag = $_SERVER["REQUEST_URI"];

        $emp = new employeeTableDataTable( DB::table('employees')->where('type', 'receptionist'));
        return $emp->render('Admin.emp');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->user('employee')->id);


        return view('receptionist.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $Created_by = ($request->user('employee')->id);

         Employee::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'national_id'=>$request->national_id,
            'type'=>'receptionist',
            // 'avatar'=>$request->avatar,
            'created_by'=> $Created_by
           
        ]);
        
         return redirect('/receptionists'); 

    }
}
   