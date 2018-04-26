<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use App\DataTables\roomsDataTable;
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
        $Reserve = new roomsDataTable(DB::table('rooms'));
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
        $room = new ReservationDataTable(DB::table('reservations'));
        return $room->render('client.reserved_rooms');
    }
}
