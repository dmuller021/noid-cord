<?php


use Illuminate\Support\Facades\Broadcast;
use App\Models\friends;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Broadcast::channel('friends.{friendID}', function (User $user, friends $friendID){
    if($user->id === $friendID->user_id_1 || $user->id === $friendID->user_id_2 && friends::find($friendID->id)) {
        return true;
    }
     return false;
});
