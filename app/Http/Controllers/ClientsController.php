<?php

namespace App\Http\Controllers;
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

        $emp = new clientsDataTable(DB::table('users')->where('approved_state',0));
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
        'country'=>$request->country,
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
