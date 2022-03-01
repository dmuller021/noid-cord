<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
