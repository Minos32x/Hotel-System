<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Floor;
use Illuminate\Http\Request;
use App\DataTables\roomsDataTable;


class roomsController extends Controller
{
    public function index()
    {
        $room = new roomsDataTable( DB::table('rooms'));
        return $room->render('Admin.emp');
    }


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $floors = Floor::all();
        return view ('room.create',['floors'=> $floors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Created_by = ($request->user('employee')->id);
        Room::create([
            'number' => $request->number,
            'capacity' => $request->capacity,
            'floor_id' => $request->floor_id,
            'price' => $request->price,
            'created_by' => $Created_by

        ]);
        return redirect('/rooms');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floors = Floor::all();
        return view ('room.create',['floors'=> $floors,'rooms' => Room::find($id)
        ]);
        return view('floor.edit', [
        ]);   
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Floor::where('id', $id)->update(
        ['floor_num' => $request->floor_num,
        'no_of_room' => $request->no_of_room,
        ]);
        return redirect ('/floors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

