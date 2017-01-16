<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Auth;
use RoleUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');
        
        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            $role = RoleUser::where('role_id',Auth::user()->role_id)->first();
            if ($role==1) {
                return redirect(url('/home'));
            }
            
            elseif ($role==2) {
                return redirect(url('/'));
            }
        }
        else{
            return redirect('/something');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
