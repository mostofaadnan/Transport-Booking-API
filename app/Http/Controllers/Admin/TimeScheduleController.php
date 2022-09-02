<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeSchedule;
class TimeScheduleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term = $request->term;
        if ($term) {
            $TimeSchedule = TimeSchedule::where('time', $term)->paginate(15);

        } else {

            $TimeSchedule = TimeSchedule::paginate(15);
        }

        return response()->json(['data' => $TimeSchedule]);


    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required',
        ]);
        $TimeSchedule = TimeSchedule::create($request->all());
        return response()->json([
            'status'=>200,
            'message' => 'Time Schedule created Succesfuly',
            'TimeSchedule' => $TimeSchedule]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSchedule $TimeSchedule)
    {
        return response()->json($TimeSchedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSchedule $TimeSchedule)
    {
        return $TimeSchedule;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSchedule $TimeSchedule)
    {
        $request->validate([
            'time' => 'required',
 
            //optional if you want this to be required
        ]);
        $TimeSchedule->time = $request->time;
        $TimeSchedule->status = $request->status;
        $TimeSchedule->save();

        return response()->json([
            'status'=>200,
            'message' => 'Time Schedule updated Successfuly!',
            'TimeSchedule' => $TimeSchedule,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSchedule $TimeSchedule)
    {
        $TimeSchedule->delete();
        return response()->json([
            'message' => 'Time Schedule Description deleted',
        ]);
    }
    public function GetList(){
    $List=TimeSchedule::all();
    return response()->json($List);
    }
}
