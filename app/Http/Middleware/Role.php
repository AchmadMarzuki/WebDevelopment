<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role {
 
    public function handle($request, Closure $next) {
        if(Auth::user()->level == 'SMK'){
            return redirect('/DashboardSMK');
        }
        if(Auth::user()->level == 'Mahasiswa'){
            return redirect('/DashboardMahasiswa');
        }
        if(Auth::user()->level == 'Kajur'){
            return redirect('/DashboardKajur');
        }
        if(Auth::user()->level == 'Kaprodi'){
            return redirect('/DashboardKaprodi');
        }
        return $next($request);
    }
}
