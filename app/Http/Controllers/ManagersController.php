<?php

namespace App\Http\Controllers;

use App\DataTables\employeeTableDataTable;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rinvex\Country\Models\Country;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;


class ManagersController extends Controller
{
    public $flag;
    use HasRoles;

    public function index()
    {
        $this->flag = $_SERVER["REQUEST_URI"];
        // dd($flag);
        $emp = new employeeTableDataTable(DB::table('employees')->where('type', 'manager'),"manager");
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


        return view('manager.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $Created_by = ($request->user('employee')->id);
        $manager= Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'national_id' => $request->national_id,
            'last_login' => now(),
            'type' => 'manager',
            'avatar' => ($request->avatar == null ? 'storage/avatars/avatar.jpg' : 'storage/avatars/' . $request->avatar),
            'created_by' => $Created_by

        ]);
        $manager->assignRole('manager');
        return redirect('/managers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('manager.edit', [
            'manager' => Employee::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $manager->update($request->all());
        Employee::where('id', $id)->update(['name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'avatar' => $request->avatar,

        ]);
        if ((Employee::find($id)->type) == 'manager') {
            return redirect('/managers');

        } else {
            return redirect('/receptionists');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();

    }
}
