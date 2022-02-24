<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class friendRequest extends Controller
{
    public function request(Request $request){
        $request = DB::table('friend_request')
            ->insert([
                'user_id_1' => $request->user()->id,
                'user_id_2' => $request->input('')
            ]);
    }
}
