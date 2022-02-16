<?php


use App\Events\Message;
use App\Http\Controllers\friendsController;
use App\Http\Controllers\chatController;
use App\Events\PrivateMessage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//
Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/friends', friendsController::class)->middleware('auth');

Route::get('/friends/{id}/chat', [chatController::class, 'chat' ])->middleware(['auth', 'checkChat']);

//Route::get('/chat', function(){
//    return view('chat');
//})->middleware(['auth'])->name('chat');
//
//Route::get('/friend_request', [requestController::class, 'index' ])
//    ->middleware(['auth'])->name('friend_request');



//Route::get('/friends.friend' [])
//
//Route::get('friends/{id}.edit', function (id $id) {
// //
//});

//Route::get('/friends', FriendsController::class, 'show')->middleware(['auth']);

//Route::post('/send-message', function(Request $request){
//    event(
//        new Message(
//            $request->input('username'),
//            $request->input('message')
//        )
//    );
//
//    return ["success" => true];
//});

Route::post('/send-privateMessage', function(Request $request){
    event(
        new privateMessage(
            $request->input('user'),
            $request->input('privateMessage'),
            $request->input('friendID')
        )
    );

    return ["success" => true];
});

//Route::post('/broadcasting/auth', function (Request $request) {
//    return $request->input('friendID');
//});

//Broadcast::routes();


require __DIR__.'/auth.php';
