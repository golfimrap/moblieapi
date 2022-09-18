<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_users = Users::select('id', 'username', 'name', 'active')->get();

        if ($data_users) {
            return response([
                'response'  => $data_users
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
        $field_users = new Users;
        $field_users->username = $request->username;
        $field_users->name = $request->name;
        $field_users->active = $request->active;
        $field_users->save();

        $data_users = Users::select('id', 'username', 'name', 'active')->where('id', $field_users->id)->first();

        if ($data_users) {
            return response([
                'response'  => $data_users
            ], 201);
        } else {
            return response([
                'message'   => 'not found'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_users = Users::select('id', 'username', 'name', 'active')->where('id', $id)->get();

        if ($data_users) {
            return response([
                'response' => $data_users
            ], 200);
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
        //
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
        $field_users = Users::find($id);
        $field_users->username = $request->username;
        $field_users->name = $request->name;
        $field_users->active = $request->active;
        $field_users->save();

        $data_users = Users::select('id', 'username', 'name', 'active')->where('id', $id)->first();

        if ($data_users) {
            return response([
                'response'  => $data_users
            ], 200);
        } else {
            return response([
                'message'   => 'not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_users = Users::find($id);

        if ($data_users) {
            $destroy = Users::destroy($id);

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