<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use App\Reservation;
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
            $Query = DB::table('reservations');
        }

        $Reserve = new ReservationDataTable($Query);
        return $Reserve->render('Admin.emp');
    }


    public function destroy($id)
    {
                Reservation::find($id)->delete();
    }
}
