<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //use AuthenticatesUsers;
    use ThrottlesLogins;
    protected $maxAttempts = 2;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function validateForm(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users'],
                'password' =>  ['required']
            ]
        );
    }
    protected function attemptLogin(Request $request){
        return Auth::attempt($request->only('email','password'),$request->filled(('remember')));
    }

    protected function sendSuccessResponse()
    {
      //  \Log::info('here');
        session()->regenerate();
        if (auth()->user()->adm == '1') {
            return redirect()->route('home');
        }
     return redirect()->route('profile');//
    }

    public function login(Request $request)
    {
        $this->validateForm($request);
        //check username and password

        if ($this->attemptLogin($request)) {

            return $this->sendSuccessResponse();
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendLoginFailedResponse();

    }
    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials', true);
    }

    public function logout()
    {
        session()->invalidate();

        Auth::logout();

        return redirect()->route('index');
    }


    protected function username()
    {
        return 'email';
    }

}
