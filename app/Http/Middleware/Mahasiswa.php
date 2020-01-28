<?php

namespace App\Http\Middleware;

use Closure;

class Mahasiswa {
 
    public function handle($request, Closure $next)
    {
        if (Auth::user()->level == 'user'){
            return $next($request);
        }
    }
}
