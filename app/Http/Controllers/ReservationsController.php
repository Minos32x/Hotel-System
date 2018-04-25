<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use Illuminate\Support\Facades\DB;
use App\Reservations;

class ReservationsController extends Controller
{

    public function index()
    {
        $Reserve = new ReservationDataTable(DB::table('reservations'));
        return $Reserve->render('Admin.emp');
    }


    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
