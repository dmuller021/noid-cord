<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    //upload and hashing the image in folder and hashed filename to database
    public function uploadImage(Request $request){

        //hasshing the image
        $newimage = hash_file('sha512', $request->image);


        //moving the image to the images folder in the public/assets directory
        $request->image->move(public_path('assets/images'), $newimage);

        //Updating the hashed image to database
        $upload = User::where('id', $request->user()->id)
        ->update([
            'image_path'    => $newimage
        ]);

        return redirect('myProfile');
    }

    // Fetch user by username...
    public function view_user(Request $request){
        $view = User::where('username', $request->route('username'));

//        dd($view);

        return view ('profileUser')
            ->with('view', $view);

    }

    //Send a friend request button (which is currently still not working)
    public function friend_request(Request $request){
        $friend_request = DB::table('friend_request')
            ->insert([
                'user_id_1' => $request->user()->id,
                'user_id_2' => $request->input('id')
            ]);

        return view('friends.user');
    }
}
