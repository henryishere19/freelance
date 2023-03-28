<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Helpers\CommonHelper;

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

    use CommonHelper, AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function login(Request $request){
		
		$this->validateLogin($request);
		
		$request->merge(['email' => CommonHelper::encryptData($request->email)]);
		if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
		
		$this->incrementLoginAttempts($request);
		$request->merge(['email' => CommonHelper::decryptData($request->email)]);
		return $this->sendFailedLoginResponse($request);
	}
	
	protected function validateLogin(Request $request){
        $this->validate($request, [
            $this->username() 	=> 'required|string',
            'password' 			=> 'required|string',
        ]);
    }
}