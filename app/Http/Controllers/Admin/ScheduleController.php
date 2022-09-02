<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
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
            $Schedule = Schedule::where('id', $term)->paginate($request->per_page);

        } else {

            $Schedule = Schedule::paginate($request->per_page);
        }
        // $Schedule = Schedule::paginate(15);
        /*  return response()->json(['data' => $Schedule]); */
        $data = ScheduleResource::collection($Schedule);
        return response()->json(['data' => $Schedule]);

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
        $validator = Validator::make($request->all(),
            [
                'schedule_date' => 'required',
                'start_time_id' => 'required|numeric',
                'start_point_id' => 'required|numeric',
                'end_point_id' => 'required|numeric',
                'bus_id' => 'required|numeric',
                'ticket_type_id' => 'required|numeric',
            ]);
        /* $scheduleDate= $fromdate = date('Y/m/d', strtotime($request->input('schedule_date'))); */
        $Schedule = new Schedule();
        $Schedule->schedule_date = $request->input('schedule_date');
        $Schedule->start_time_id = $request->input('start_time_id');
        $Schedule->route_id = $request->input('route_id');
        $Schedule->bus_id = $request->input('bus_id');
        $Schedule->stuff_id = $request->input('stuff_id');
        $Schedule->ticket_type_id = $request->input('ticket_type_id');
        $Schedule->arriable_status = $request->input('arriable_status');
        $Schedule->status = $request->input('status');
        $Schedule->Note = $request->input('Note');
        $Schedule->save();
        return response()->json([
            'status' => 200,
            'message' => 'Schedule created Succesfuly',
            'TicketPrice' => $Schedule]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $Schedule)
    {
        return response()->json($Schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $Schedule)
    {
        return $Schedule;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $Schedule)
    {
        $request->validate([
            'schedule_date' => 'required',
            'start_time_id' => 'required|numeric',
            'route_id' => 'required|numeric',
            'bus_id' => 'required|numeric',
            'ticket_type_id' => 'required|numeric',
        ]);

        $Schedule->schedule_date = $request->schedule_date;
        $Schedule->start_time_id = $request->start_time_id;
        $Schedule->route_id = $request->route_id;
        $Schedule->bus_id = $request->bus_id;
        $Schedule->stuff_id = $request->stuff_id;
        $Schedule->ticket_type_id = $request->ticket_type_id;
        $Schedule->arriable_status = $request->arriable_status;
        $Schedule->status = $request->status;
        $Schedule->Note = $request->Note;
        $Schedule->save();

        return response()->json([
            'status' => 200,
            'message' => 'Schedule updated Successfuly!',
            'TicketType' => $Schedule,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $Schedule)
    {
        $Schedule->delete();
        return response()->json([
            'message' => 'Schedule Schedule Description deleted',
        ]);
    }

    public function GetList()
    {
        $List = Schedule::all();
        return response()->json($List);
    }
}
