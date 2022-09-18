<?php

namespace App\Http\Controllers;

use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_mobile = Mobile::select('id', 'brands', 'models', 'price')->get();

        if ($data_mobile) {
            return response([
                'data'      => $data_mobile,
                'message'   => 'Success'
            ], 200);
        } else {
            return response([
                'message'   => 'not found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field_mobile = new Mobile;
        $field_mobile->brands = $request->brands;
        $field_mobile->models = $request->models;
        $field_mobile->price  = $request->price;
        $field_mobile->save();

        return response([
            'message'       => 'Create successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_mobile = Mobile::select('id', 'brands', 'models', 'price')
            ->where('id', $id)
            ->first();

        if ($data_mobile) {
            return response([
                'data'      => $data_mobile,
                'message'   => 'Success'
            ], 200);
        } else {
            return response([
                'message' => 'not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field_mobile = Mobile::find($id);
        $field_mobile->brands = $request->brands;
        $field_mobile->models = $request->models;
        $field_mobile->price  = $request->price;
        $field_mobile->save();

        return response([
            'message'       => 'Update successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_mobile = Mobile::find($id);

        if ($data_mobile) {
            $destroy = Mobile::destroy($id);

            if ($destroy) {
                return response(['message' => 'Destroy successfully'], 200);
            } else {
                return response(['message' => 'Destroy Fail!!']);
            }
        } else {
            return response(['message' => 'Missing']);
        }
    }
}