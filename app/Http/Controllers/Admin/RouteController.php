<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route_Description;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $Route_Description = Route_Description::all();
        return response()->json($Route_Description); */
        /*  $order = (string) $request->order;
        $query = Route_Description::orderBy($request->column, $order);
        $Route_Descriptions = $query->paginate($request->per_page ?? 5);
         */

        /*  $order = (string) $request->order;

        /* $query = Route_Description::orderBy($request->column, $order);
        $Route_Descriptions = $query->paginate($request->per_page ?? 2);

        return RouteResources::collection($Route_Descriptions); */
        $Route_Description = Route_Description::all();
        return response()->json($Route_Description);

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
            'startting_point' => 'required',
            'starting_station' => 'required',
            'ending_point' => 'required',
            'ending_station' => 'required',
            //optional if you want this to be required
        ]);
        $Route_Description = Route_Description::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Route created Succesfuly',
            'Route_Description' => $Route_Description]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Route_Description $Route_Description)
    {
        return response()->json($Route_Description);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Route_Description $Route_Description)
    {
        return $Route_Description;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route_Description $Route_Description)
    {
        $request->validate([
            'startting_point' => 'required',
            'starting_station' => 'required',
            'ending_point' => 'required',
            'ending_station' => 'required',
            //optional if you want this to be required
        ]);
        $Route_Description->startting_point = $request->startting_point;
        $Route_Description->starting_station = $request->starting_station;
        $Route_Description->ending_point = $request->ending_point;
        $Route_Description->ending_station = $request->ending_station;
        $Route_Description->status = $request->status;
        $Route_Description->save();

        return response()->json([
            'status' => 200,
            'message' => 'expense updated!',
            'expense' => $Route_Description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route_Description $Route_Description)
    {
        $Route_Description->delete();
        return response()->json([
            'message' => 'Route Description deleted',
        ]);
    }
    public function GetList()
    {
        $List = Route_Description::all();
        return response()->json($List);
    }
    public function GetDataByStartPoint($id)
    {
        $data = Route_Description::select('ending_point')->find($id);
        if (!is_null($data)) {
            return response()->json($data);

        } else {

            return response()->json(['message' => '']);
        }

    }
}
