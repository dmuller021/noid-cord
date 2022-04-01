<?php


use App\Events\Message;
use App\Http\Controllers\friendsController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\userController;
use App\Http\Controllers\profileController;
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



Route::group(['middleware' => 'auth'], function()  {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/myProfile', function () {
        return view('profileMe');
    })->name('myProfile');

    Route::get('/chat', [userController::class, 'chatImage'])->name('chat');
    Route::resource('friends', friendsController::class, [
        'names' => [
            'index' => 'friends'
        ]
    ]);

    Route::get('/friend_request', function () {
        return view('friends.request');
    })->name('friend_request');

    route::get('/search', function(){
        return view('search');
    })->name('search');
    Route::get('/searchUser', [userController::class, 'searchUser']);


    Route::post('/uploadimage', [profileController::class, 'uploadImage']);
    Route::get('/user/{username}', [profileController::class, 'view_user']);
});

Route::get('/friends/{id}/chat', [chatController::class, 'chat' ])->middleware(['auth', 'checkChat']);


Route::post('/send-Message', function(Request $request){
    event(
        new Message(
            $request->input('username'),
            $request->input('message'),
            $request->input('image')
        )
    );

    return ["success" => true];
});

Route::post('/send-privateMessage', function(Request $request){
    event(
        new privateMessage(
            $request->input('user'),
            $request->input('privateMessage'),
            $request->input('friendID'),
            $request->input('image')
        )
    );

    return ["success" => true];
});

//Route::post('/broadcasting/auth', function (Request $request) {
//    return $request->input('friendID');
//});

//Broadcast::routes();


require __DIR__.'/auth.php';
