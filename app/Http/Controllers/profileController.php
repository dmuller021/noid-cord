<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\friends;
use Illuminate\Support\Facades\DB;
use App\Models\friend_request;

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
        $view = User::where('username', $request->route('username'))
        ->first();

//        $friends = friends::where('user_id_1', '=', $view->id)
//            ->orWhere('user_id_2', '=', $view->id)
//
//            ->where('user_id_1', '=', $request->user()->id)
//            ->orWhere('user_id_2', '=', $request->user()->id)
//
//        ->first();


        $friends = friends::join( 'users AS user1', 'user1.id', '=', 'user_id_1')
            ->join('users AS user2', 'user2.id', '=', 'user_id_2')
            ->select('user1.username AS username1', 'user2.username AS username2', 'user1.image_path AS image1', 'user2.image_path AS image2', 'user_id_1', 'user_id_2', 'friends.id AS id')
            ->where('user_id_1', '=', $view->id)->where('user_id_2', '=', $request->user()->id)
            ->orWhere('user_id_1', '=', $request->user()->id)->where('user_id_2', '=', $view->id)
            ->first();


        $request_exists = friend_request::select()
            ->where('user_sent_request', '=', $request->user()->id, 'AND', 'user_received_request', '=', $view->id )
            ->orWhere('user_sent_request', '=', $view->id, 'AND', 'user_received_request', '=', $request->user()->id )
            ->first();

//        dd($request_exists);

        return view ('profileUser')
            ->with('view', $view)
            ->with('friends', $friends)
            ->with('exists', $request_exists);

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
