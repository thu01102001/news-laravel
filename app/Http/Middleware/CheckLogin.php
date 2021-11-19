<?php

namespace App\Http\Middleware;

use Closure;

//su dung doi tuong Auth de kiem tra dang nhap
use Auth;

class CheckLogin
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
        //kiem tra xem user da dang nhap chua
        //url('login') -> tao url
        //redirect -> di chuyen den mot url
        if(Auth::check() == false)
            return redirect(url('login'));
        return $next($request);
    }
}
