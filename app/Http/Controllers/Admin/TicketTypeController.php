<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TicketType;
class TicketTypeController extends Controller
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
            $TimeSchedule = TicketType::where('name', $term)->paginate(15);

        } else {

            $TimeSchedule = TicketType::paginate(15);
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
            'name' => 'required',
        ]);
        $TicketType = TicketType::create($request->all());
        return response()->json([
            'status'=>200,
            'message' => 'Ticket Type created Succesfuly',
            'TicketType' => $TicketType]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketType $TicketType)
    {
        return response()->json($TicketType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( TicketType $TicketType)
    {
        return $TicketType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketType $TicketType)
    {
        $request->validate([
            'name' => 'required',
 
            //optional if you want this to be required
        ]);
        $TicketType->name = $request->name;
        $TicketType->save();

        return response()->json([
            'status'=>200,
            'message' => 'Time Schedule updated Successfuly!',
            'TicketType' => $TicketType,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketType $TicketType)
    {
        $TicketType->delete();
        return response()->json([
            'message' => 'Ticket Type Schedule Description deleted',
        ]);
    }

    public function GetList(){
        $TicketType= TicketType::all();
        return response()->json($TicketType);

    }
}
