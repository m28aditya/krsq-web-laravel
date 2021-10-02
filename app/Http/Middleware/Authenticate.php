<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(Auth::guard('admin')->check())   
        {
            return route('adminHome');
        }
        elseif(Auth::guard('user')->check())   
        {
            return route('mahasiswaHome');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}