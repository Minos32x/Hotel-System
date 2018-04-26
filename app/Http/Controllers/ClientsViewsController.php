<?php

namespace App\Http\Controllers;

use App\DataTables\ClientReservedDataTable;
use App\DataTables\ClientRoomsDataTable;
use App\Reservations;
use App\User;
use Illuminate\Support\Facades\DB;

class ClientsViewsController extends Controller
{


    public function index()
    {
        return view('client.index');
    }

    public function profile()
    {
        $User = User::find(1);
        return view('client.profile', ['user' => $User]);
    }

    public function create()
    {

        $Reserve = new ClientRoomsDataTable(DB::table('rooms')->where('is_reserved' ,0));
        return $Reserve->render('client.reservation');
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function showReserved()
    {
//$d=Reservations::find(1)->room()->id;
//         dd($d);
        $room = new ClientReservedDataTable(DB::table('reservations'));
        return $room->render('client.reserved_rooms');
    }
}
