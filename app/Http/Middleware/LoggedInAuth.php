<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Session\Session;

class LoggedInAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //$request->path()
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        if(($path == 'login' || $path == 'register') && (request()->session()->get('data'))){  //if you try to access login or register page while you are logged
            return redirect('/');
        }
        else if($path != 'login' && $path != 'register' && !request()->session()->get('data')){    //if you try to access homepage without being logged
            return redirect('login');
        }
        return $next($request);
    }
}
