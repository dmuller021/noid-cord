<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function searchUser(Request $request){
        $test = $request->input('searchUser');

//        dd($test);

        if($test == "") {
            return redirect ('search');
        }
        else if ($test == "%"){
            return redirect('search');
        }

        $query = User::select()
            ->where('username', 'LIKE', '%'.$test.'%',)
            ->get();

        return view('search')
            ->with('searchedUser', $query);
    }

    public function chatImage (Request $request){
        $select = User::where('id', $request->user()->id)
            ->first();

        return view('publicChat')
            ->with('select', $select);
    }
}
