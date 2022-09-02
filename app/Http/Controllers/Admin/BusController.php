<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusInfo;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $BusInfo = BusInfo::all();
        return response()->json($BusInfo);

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
            'bus_name' => 'required',
            'bus_number' => 'required',
            'type' => 'required',
            'total_seat' => 'required',
            //optional if you want this to be required
        ]);
        $BusInfo = BusInfo::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Route created Succesfuly',
            'Route_Description' => $BusInfo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BusInfo $BusInfo)
    {
        return response()->json($BusInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BusInfo $BusInfo)
    {
        return $BusInfo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusInfo $BusInfo)
    {
        $request->validate([
            'bus_name' => 'required',
            'bus_number' => 'required',
            'type' => 'required',
            'total_seat' => 'required',
            //optional if you want this to be required
        ]);
        $BusInfo->bus_name = $request->bus_name;
        $BusInfo->bus_number = $request->bus_number;
        $BusInfo->License_Number = $request->License_Number;
        $BusInfo->type = $request->type;
        $BusInfo->bus_company = $request->bus_company;
        $BusInfo->total_seat = $request->total_seat;
        $BusInfo->per_label_seat = $request->per_label_seat;
        $BusInfo->status = $request->status;
        $BusInfo->save();

        return response()->json([
            'status' => 200,
            'message' => 'businfo updated!',
            'BusInfo' => $BusInfo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusInfo $BusInfo)
    {
        $BusInfo->delete();
        return response()->json([
            'message' => 'Route Description deleted',
        ]);
    }
    public function GetList()
    {
        $List = BusInfo::all();
        return response()->json($List);
    }
    public function GetDataByBusNo($id)
    {
        $data = BusInfo::select('type','total_seat')->find($id);
        if (!is_null($data)) {
            return response()->json($data);

        } else {

            return response()->json(['message' => '']);
        }

    }
}
