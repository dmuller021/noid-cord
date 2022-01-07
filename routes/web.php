<?php


use App\Events\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/chat', function(){
    return view('chat');
});

Route::post('/send-message', function(Request $request){
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );

    return ["success" => true];
});


require __DIR__.'/auth.php';
