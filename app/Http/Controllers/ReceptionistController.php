<?php

namespace App\Http\Controllers;

use App\DataTables\employeeTableDataTable;
use App\Employee;
use App\Http\Requests\CreateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class ReceptionistController extends Controller
{
    use HasRoles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $emp = new employeeTableDataTable(DB::table('employees')->where('type', 'receptionist'), "receptionist");
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {

        $Created_by = ($request->user('employee')->id);

        if (empty($request->file('avatar'))) {

            $image = 'avatar.jpg';
        } else {

            $image = time() . '.' . $request->file('avatar')->getCLientOriginalName();
            Storage::putFileAs('public/avatars', $request->avatar, $image);
        }

        $receptionist = Employee::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'national_id' => $request->national_id,
            'type' => 'receptionist',
            'avatar' => $image,
            'created_by' => $Created_by

        ]);
        $receptionist->assignRole('receptionist');

        return redirect('/receptionists');

    }
}
   