<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Room;
use Illuminate\Http\Request;
use App\DataTables\roomsDataTable;


class roomsController extends Controller
{
    public function index()
    {
        $room = new roomsDataTable( DB::table('rooms'));
        return $room->render('Admin.emp');
    }
}
