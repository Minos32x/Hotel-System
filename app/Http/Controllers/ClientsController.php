<?php

namespace App\Http\Controllers;
// use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\clientsDataTable;
use Illuminate\Foundation\Auth\User;
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

        $emp = new clientsDataTable(DB::table('users'));
        return $emp->render('Admin.emp');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('client.edit',[
            'client' => User::find($id),'countries'=>$countries
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
        User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'avatar' => ($request->avatar == null ? 'storage/avatars/avatar.jpg' : 'storage/avatars/' . $request->avatar),
        'password' => $request->password,
        'updated_at'=>now(),
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
        //
    }
}
