<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;

class chatController extends Controller
{
    public function chat($id) {

        $friends = friends::select('id')
            ->where('id', $id)
            ->get();

//        dd($friends);


        return view('friends.chat')
            ->with('friends', $friends);

    }
}
