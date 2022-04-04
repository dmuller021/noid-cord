<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\friend_request;
use App\Models\friends;

class friendRequest extends Controller
{
    public function request(Request $request){
        $request = DB::table('friend_request')
            ->insert([
                'user_id_1' => $request->user()->id,
                'user_id_2' => $request->input('')
            ]);
    }

    public function incoming(Request $request) {
        $incoming = friend_request::join('users', 'users.id', '=', 'user_sent_request')
            ->where('user_request_received', '=',  $request->user()->id)
            ->get();

//        dd($incoming);

        return view('friends.request')
            ->with('requests', $incoming);
    }

    public function deny(Request $request) {

//        dd($request->input('id'));

        $deny = friend_request::select('id')
            ->where('user_sent_request', '=', $request->input('id') )
            ->delete();


        return view('friends.request');
    }

    public function accept(Request $request) {

            $accept = friends::insert([
                'user_id_1' => $request->user()->id,
                'user_id_2' => $request->input('id')
            ]);

            $deny = friend_request::select('id')
            ->where('user_sent_request', '=', $request->input('id') )
            ->delete();

            return view('friends.request');

    }
}
