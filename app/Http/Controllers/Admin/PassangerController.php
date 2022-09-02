<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PassangerInfo;
use Illuminate\Http\Request;

class PassangerController extends Controller
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
            $PassangerInfo = PassangerInfo::where('name', $term)->paginate(15);

        } else {

            $PassangerInfo = PassangerInfo::paginate(15);
        }

        return response()->json(['data' => $PassangerInfo]);

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
            'mobile' => 'required',
        ]);
        $PassangerInfo = PassangerInfo::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Route created Succesfuly',
            'Passanger_information' => $PassangerInfo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PassangerInfo $PassangerInfo)
    {
        return response()->json($PassangerInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PassangerInfo $PassangerInfo)
    {
        return $PassangerInfo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassangerInfo $PassangerInfo)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            //optional if you want this to be required
        ]);
        $PassangerInfo->name = $request->name;
        $PassangerInfo->address = $request->address;
        $PassangerInfo->mobile = $request->mobile;
        $PassangerInfo->email = $request->email;
        $PassangerInfo->save();

        return response()->json([
            'status' => 200,
            'message' => 'businfo updated!',
            'Passanger_information' => $PassangerInfo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassangerInfo $PassangerInfo)
    {
        $PassangerInfo->delete();
        return response()->json([
            'message' => 'Passanger Information deleted',
        ]);
    }
}
