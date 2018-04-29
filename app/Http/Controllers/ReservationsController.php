<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use App\Reservation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{

    public function index()
    {
        if ((Auth::guard('employee')->user()->type) == 'admin') {
            $Query = DB::table('reservations');
        } else if ((Auth::guard('employee')->user()->type) == 'manager') {
            $Query = DB::table('reservations');
        } else if ((Auth::guard('employee')->user()->type) == 'receptionist') {
            $approved = User::all()->where('approved_by', Auth::guard('employee')->user()->id);
            $Query = DB::table('reservations')->where('client_id', 'in', $approved);

        }

        $Reserve = new ReservationDataTable($Query);
        return $Reserve->render('Admin.emp');
    }


    public function destroy($id)
    {
        $room=Reservation::find($id)->room_id;
        DB::table('rooms')->where('number',$room)->update([
            'is_reserved'=>0,
        ]);
        Reservation::find($id)->delete();
