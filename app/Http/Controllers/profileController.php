<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function uploadImage(Request $request){

//        $newimage = time() . '-' . $request->user()->name . '.' . $request->image->extension();

        $newimage = hash_file('sha512', $request->image);


        $request->image->move(public_path('assets/images'), $newimage);

//        dd($newimage);

        $upload = User::where('id', $request->user()->id)
        ->update([
            'image_path'    => $newimage
        ]);

        return redirect('myProfile');
    }

    public function view_user(Request $request){
        $view = User::all()
        ->where('id', $request->route('id'));

//        dd($view);

        return view ('profileUser')
            ->with('view', $view);

    }

    public function friend_request(Request $request){
        $friend_request = DB::table('friend_request')
            ->insert([
                'user_id_1' => $request->user()->id,
                'user_id_2' => $request->input('id')
            ]);

        return view('friends.user');
    }
}
