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
        if ((Auth::guard('employee')->user()->type) == 'admin' || (Auth::guard('employee')->user()->type) == 'manager') {
            $Query = Reservation::all();
        } 
            else{
            $approved = User::all()->where('approved_by', Auth::guard('employee')->user()->id);
            $Query = Reservation::where('client_id','in',$approved)->get();

        }
        // DB::table('reservations')->where('client_id', 'in', $approved)
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
        }
    }