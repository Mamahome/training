<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    // protected $redirectTo = '/home';

    // protected $redirectTo = '/admin/tasks';  // to where you want to go after a successful login
    public function redirectTo(){
        
    $role = Auth::user()->admin; 
    
    
    // Check user role
    switch ($role) {
        case '1':
                return '/admin/tasks';
            break;
        case '0':
                return '/home';
            break; 
        default:
                return '/login'; 
            break;
    }
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function logout () {
    //     //logout user
    //     auth()->logout();
    //     // redirect to homepage or login
    //     return redirect('/login');
    // }



    // protected function credentials(\Illuminate\Http\Request $request)
    // {
    //     return ['email' => $request->{$this->username()}, 'password' => $request->password, 'admin' => 1];
    // }    

}
