<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StuffInfo;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class StuffController extends Controller
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
            $StuffInfo = StuffInfo::where('name', $term)->paginate(15);

        } else {

            $StuffInfo = StuffInfo::paginate(15);
        }

        return response()->json(['data' => $StuffInfo]);

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
                'images' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'mobile' => 'required',
            ]
        );

        $StuffInfo = new StuffInfo();
        $StuffInfo->name = $request->input('name');
        $StuffInfo->address = $request->input('address');
        $StuffInfo->mobile = $request->input('mobile');
        $StuffInfo->email = $request->input('email');
        $StuffInfo->joining_date = $request->input('joining_date');
        $StuffInfo->status = $request->input('status');
        if ($request->hasFile('images')) {

            $image = $request->File('images');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/Stuff/' . $img);
            Image::make($image)->save($location);
            $StuffInfo->image = $img;
        }
        $StuffInfo->save();
        return response()->json([
            'status' => 200,
            'message' => 'Stuff Information created Succesfuly',
            'stauff_information' => $request->input('name'),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StuffInfo $StuffInfo)
    {
        return response()->json($StuffInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StuffInfo $StuffInfo)
    {
        return $StuffInfo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StuffInfo $StuffInfo)
    {
        $validator = Validator::make($request->all(),
            [
                'images' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'mobile' => 'required',
            ]
        );

        $StuffInfo->name = $request->input('name');
        $StuffInfo->address = $request->input('address');
        $StuffInfo->mobile = $request->input('mobile');
        $StuffInfo->email = $request->input('email');
        $StuffInfo->joining_date = $request->input('joining_date');
        $StuffInfo->status = $request->input('status');
        if ($request->hasFile('images')) {

            if (File::exists('storage/app/public/Stuff/' . $StuffInfo->image)) {
                File::delete('storage/app/public/Stuff/' . $StuffInfo->image);
            }
            $image = $request->File('images');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/Stuff/' . $img);
            Image::make($image)->save($location);
            $StuffInfo->image = $img;
        }
        $StuffInfo->save();
        return response()->json([
            'status' => 200,
            'message' => 'Stuff Information Update Succesfuly',
            'stauff_information' => $request->input('name'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StuffInfo $StuffInfo)
    {
        if (!is_null($StuffInfo)) {

            if (File::exists('storage/app/public/Stuff/' . $StuffInfo->image)) {
                File::delete('storage/app/public/Stuff/' . $StuffInfo->image);
            }
            $StuffInfo->delete();
            return response()->json([
                'message' => 'Passanger Information deleted',
            ]);
        }

    }
    public function GetList()
    {
        $List = StuffInfo::all();
        return response()->json($List);
    }

}
