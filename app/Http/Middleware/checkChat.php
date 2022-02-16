<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\friends;

class checkChat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $query = friends::select('user_id_1', 'user_id_2', 'id')
            ->where('id', $request->route('id'))
            ->get();


        foreach($query as $fuck) {
            if ($fuck->user_id_1 == $request->user()->id) {
                return $next($request);
            }
            else if($fuck->user_id_2 == $request->user()->id){
                return $next($request);
            }
        }
        return redirect('/');


    }
}
