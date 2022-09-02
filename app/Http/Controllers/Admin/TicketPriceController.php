<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketPrice;
use Illuminate\Http\Request;

class TicketPriceController extends Controller
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
            $TimeSchedule = TicketPrice::where('ticket_type', $term)->paginate(15);

        } else {

            $TimeSchedule = TicketPrice::paginate(15);
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
            'price' => 'required',
            'ticket_type' => 'required',
        ]);
        $TicketPrice = TicketPrice::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Ticket Price created Succesfuly',
            'TicketPrice' => $TicketPrice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketPrice $TicketPrice)
    {
        return response()->json($TicketPrice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketPrice $TicketPrice)
    {
        return $TicketPrice;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketPrice $TicketPrice)
    {
        $request->validate([
            'price' => 'required',
            'ticket_type' => 'required',

            //optional if you want this to be required
        ]);
        $TicketPrice->name = $request->price;
        $TicketPrice->ticket_type = $request->ticket_type;
        $TicketPrice->save();

        return response()->json([
            'status' => 200,
            'message' => 'Ticket Price updated Successfuly!',
            'TicketType' => $TicketPrice,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketPrice $TicketPrice)
    {
        $TicketPrice->delete();
        return response()->json([
            'message' => 'Ticket Price Schedule Description deleted',
        ]);
    }
    public function GetList()
    {
        $List = TicketPrice::where('status', 1)->get();
        return response()->json($List);

    }
    public function GetDataByType($id)
    {
        $data = TicketPrice::select('price')->find($id);
        if (!is_null($data)) {
            return response()->json($data);

        } else {

            return response()->json(['message' => '']);
        }

    }
}
