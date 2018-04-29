<?php

namespace App\Http\Controllers;
use App\Floor;
use App\Http\Requests\FLoorCreateRequest;
use App\Http\Requests\FloorUpdateRequest;
use Illuminate\Support\Facades\DB;

use App\DataTables\GenericDataTable;
use App\DataTables\employeeTableDataTable;

use Illuminate\Http\Request;

class FloorsController extends Controller
{
    public $Floor_Number;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floor = new GenericDataTable(DB::table('floors'),"floor");
        return $floor->render('Admin.emp');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('floor.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FLoorCreateRequest $request)
    {
        $Created_by = ($request->user('employee')->id);
        $this->Random_number();
        Floor::create([
            'floor_num' => $this->Floor_Number,
            'no_of_room' => $request->no_of_room,
            'created_by' => $Created_by

        ]);
        return redirect('/floors');


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
        return view('floor.edit', [
            'floor' => Floor::find($id)
        ]);   
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FloorUpdateRequest $request, $id)
    {
        Floor::where('id', $id)->update(
        [
        
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
        $room_number= DB::table('rooms')->where('floor_id', $id)->count();
        if ($room_number >= 1){
            return "Floor Can't Be Deleted As It Contains Rooms !";
        }
        else{
            DB::table('floors')->where('id', $id)->delete();
            return "Deleted Successfully";
        }
       
        
    }
    public function Random_number()
    {
        $this->Floor_Number=rand ( 1000 , 9999 );
        if (Floor::where('floor_num', '=', $this->Floor_Number)->count() > 0)
         {
            Random_number();
         }
    }
}
