<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckPairs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = new User();
        $id2 = $request->route('id2');
        foreach($user->getPairedPeople() as $pair){
            if($pair['id'] == $id2){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
