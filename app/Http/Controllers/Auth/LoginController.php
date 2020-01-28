<?php

namespace App\Http\Controllers\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 

class LoginController extends Controller {
 

    use AuthenticatesUsers;
 
    protected $redirectTo = '/home';

  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 
    protected function nim(){
        $this->nim = filter_var(request()->nim, FILTER_VALIDATE_EMAIL) ? 'email' : 'nim';
            request()->merge([$this->nim => request()->nim]);
        return property_exists($this, 'nim') ? $this->nim : 'email';
    
}
    // protected function credentials(Request $request)
    // {
    //     $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
    //         ? $this->username()
    //         : 'username';

    //     return [
    //         $field => $request->get($this->username()),
    //         'password' => $request->password,
    //     ];
    // }
    // autentifikasi akun
    public function authenticated(Request $request, $user) {
        if (!$user->is_verified) {
            auth()->logout();
            return back()->with('warning', 'Anda Harus melakukan konfirmasi email. Kami Telah Mengirimkan Link Konfirmasi, silahkan Periksa Email anda');
        }
        return redirect()->intended($this->redirectPath());
    }
}