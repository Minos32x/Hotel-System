<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use App\Reservations;
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
            $Query = DB::table('reservations')->where('receptionist_id', Auth::guard('employee')->user()->id);
        }

        $Reserve = new ReservationDataTable($Query);
        return $Reserve->render('Admin.emp');
    }


    public function destroy($id)
    {
        Reservations::find($id)->delete();
    }
}
