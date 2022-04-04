<?php

namespace App\Http\Controllers;

use App\Models\friends;
use Illuminate\Http\Request;

class friendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;


//        $query = friends::all();

        $friends = friends::join( 'users AS user1', 'user1.id', '=', 'user_id_1')
            ->join('users AS user2', 'user2.id', '=', 'user_id_2')
            ->select('user1.username AS username1', 'user2.username AS username2', 'user1.image_path AS image1', 'user2.image_path AS image2', 'user_id_1', 'user_id_2', 'friends.id AS id')
            ->where('user_id_1', '=', $id)->orWhere('user_id_2', '=', $id)
            ->get();

//        $names1 = friends::join('users AS user1', 'user1.id', '=', 'user_id_1')
//            ->select('name')
//            ->where('user_id_1', '=', $id, '&&', 'user_id_2', '!=', $id)
//            ->get();
//
//        $names2 = friends::join('users AS user2', 'user2.id', '=', 'user_id_2')
//            ->select('name')
//            ->where('user_id_2', '=', $id, '&&', 'user_id_1', '!=', $id)
//            ->get();


        $result = compact("friends",  "id");
//
//            dd($friends);

//        dd($result);

        return view('friends.friend')
            ->with($result);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
