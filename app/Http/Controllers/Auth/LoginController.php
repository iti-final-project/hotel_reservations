<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ValidateLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->flashOnly(['email']);
        $validationRequest = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validationRequest->fails())
        {
            return redirect()->back()->withErrors($validationRequest->errors());
        }

        $credentials = $this->credentials($request);

        $email = $credentials['email'];

        $password = $credentials['password'];

        $remember = $request->input('keepLogin')?true:false;

        if(($user = Hotel::where('email', $email))->count() > 0){
            $user = $user->first();
            if(Hash::check($password,$user->password)){
                if (Auth::attempt($credentials,$remember)){
                    return $this->sendLoginResponse($request);
                }
            }
        }
        throw ValidationException::withMessages([
            'form' => [trans('auth.failed')],
        ]);
    }

}
