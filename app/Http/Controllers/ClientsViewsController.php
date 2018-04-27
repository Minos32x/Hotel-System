<?php

namespace App\Http\Controllers;

use App\DataTables\ClientReservedDataTable;
use App\DataTables\ClientRoomsDataTable;
use App\Http\Requests\UpdateUserRequest;
use App\Room;
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
        $countries = countries();
        $User = User::find($id);
        return view('client.editProfile', ['user' => $User,
            'countries' => $countries]);
    }

    public function update(UpdateUserRequest $request, $id)
    {

        if (empty($request->file('avatar'))) {

            $image = User::find(18)->avatar;
        } else {

            $image = time() . '.' . $request->file('avatar')->getCLientOriginalName();
            Storage::putFileAs('public/avatars', $request->avatar, $image);
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'country' => $request->country,
            'avatar' => $image

        ]);

        return redirect('client/profile');

    }


    public function showReservationForm()
    {
        return view('client.reservation_form');
    }


    public function create($id)
    {

        return view('client.reservation_form', ['id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $request->validate(['accompany_number' => 'required']);

        $max_num = Room::find($id)->capacity;
        $accompany = $request->accompany_number;
        $accompany = (int)$accompany;
        if ($max_num < $accompany) {
            return view('client/reservations/' . $id . '/room', with('message', "Wrong Validation Number"));
        } else {


            return redirect('client/show');
        }
    }


}
