<?php

namespace App\Http\Controllers;

use App\DataTables\clientsDataTable;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Rinvex\Country\Models\Country;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ((Auth::guard('employee')->user()->type) == 'admin') {
            $Query = DB::table('users');
        } else if ((Auth::guard('employee')->user()->type) == 'manager') {
            $Query = DB::table('users');
        } else if ((Auth::guard('employee')->user()->type) == 'receptionist') {
            $Query = DB::table('users')->where('approved_state', 0);
        }
        $emp = new clientsDataTable($Query);
        return $emp->render('Admin.emp');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myClients()
    {
        $Query = DB::table('users')->where('approved_by', Auth::guard('employee')->user()->id);
        $emp = new clientsDataTable($Query);
        return $emp->render('Admin.emp');
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $state = 1;
        $Approved_By = Auth::guard('employee')->user()->id;

        User::find($id)->update([
            'approved_by' => $Approved_By,
            'approved_state' => $state,
        ]);

        $Mail = new MailsController();
        $Mail->ConfirmationMail($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $countries = countries();
        return view('client.edit', [
            'client' => User::find($id), 'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        if (empty($request->file('avatar'))) {

            $image = User::find($id)->avatar;
        } else {

            $image = time() . '.' . $request->file('avatar')->getCLientOriginalName();
            Storage::putFileAs('public/avatars', $request->avatar, $image);
        }


        User::where('id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $image,
            'country' => $request->country,
            'updated_at' => now(),
        ]);
        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

    }
}
