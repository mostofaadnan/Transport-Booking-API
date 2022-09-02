<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingControler extends Controller
{
    public function index(Request $request)
    {

    $Schedule = Schedule::paginate(15);        
        /*  return response()->json(['data' => $Schedule]); */
        $data = Booking::collection($Schedule);
        // return response()->json(['data' => $Schedule]);
        return response()->json($data);
    }
}
