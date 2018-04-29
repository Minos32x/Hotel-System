<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Floor;
use Illuminate\Http\Request;
use App\DataTables\GenericDataTable;


class roomsController extends Controller
{
    public function index()
    {
        $room = new GenericDataTable( Room::all(),"room");
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
        return view ('room.edit',['floors'=> $floors,'room' => Room::find($id)]);
        
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
        Room::where('id', $id)->update(
        [
            'number' => $request->number,
            'capacity' => $request->capacity,
            'floor_id' => $request->floor_id,
            'price' => $request->price,
        ]);
        return redirect ('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $is_reserved = DB::table('rooms')->select('is_reserved')->where('id',$id)->get()[0]->is_reserved    ;
        
        if($is_reserved === 0){

            DB::table('rooms')->where('id', $id)->delete();
            return "Done";
        }
        else{
           return "sorry the room is reserved and can't be deleleted";
            
        }
            
        
    }
}

