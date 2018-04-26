<?php

namespace App\Http\Controllers;

use App\DataTables\ClientReservedDataTable;
use App\DataTables\ClientRoomsDataTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Rinvex\Country\Models\country;

class ClientsViewsController extends Controller
{


    public function index()
    {
        return view('client.index');
    }

    public function profile()
    {
        $User = User::find(Auth::user()->id);
        return view('client.profile', ['user' => $User]);
    }

    public function showRooms()
    {
        $Reserve = new ClientRoomsDataTable(DB::table('rooms')->where('is_reserved', 0));
        return $Reserve->render('client.reservation');
    }


    public function showReserved()
    {
        $room = new ClientReservedDataTable(DB::table('reservations')->where('client_id', Auth::user()->id));
        return $room->render('client.reserved_rooms');
    }


    public function edit($id)
    {
        $countries=countries();
        $User=User::find($id);
        return view('client.editProfile',['user'=>$User,
            'countries'=>$countries]);
    }

    public function update(Request $req,$id)
    {

        $image=time().$req->file('avatar');
        Storage::disk('public')->putFileAs('/avatars', $req->file('avatar'),$image);

        User::find($id)->update([
           'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'gender'=>$req->gender,
            'country'=>$req->country,
            'avatar'=>($req->avatar == null ? 'avatar.jpg' : $image)

        ]);

   return redirect('client/profile');

    }



}
