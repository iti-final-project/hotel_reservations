<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use  App\Hotel;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $countries = json_decode(file_get_contents("http://country.io/names.json"),true);
        sort($countries);
        return view('auth.register',['countries'=>$countries]);
    }


    public function register(Request $request)
    {
        $validationRequest = Validator::make([
            'name' => trim($request->get('name')),
            'user_name' => trim($request->get('username')),
            'password' => trim($request->Hash::make(get('password'))),
            'confirm_password' => trim($request->->Hash::make(get('password_confirm'))),
            'country' => trim($request->get('country')),
            'city' => trim($request->get('city')),
            'district' => trim($request->get('district')),
            'telephone' => trim($request->get('telephone'))
        ], [
            'name' => ['required', 'string', 'max:255', 'min:4',
                'unique:hotels', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'user_name' => ['required', 'string', 'max:255', 'min:4', 'unique:hotels', 'without_spaces',
                'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:hotels'],
            'password' => ['required', 'min:8', 'max:100', 'confirmed', 'string',
                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/',
                'unique:hotels'],
            'confirm_password' => ['required', 'same:password', 'confirmed', 'string'],
            'country' => ['required_with_all :city,district', 'country'],
            'city' => ['required_with_all :country,district', 'string', 'max:100', 'min:4',
                'regex:/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/'],
            'district' => ['required_with_all :country,city', 'string', 'min:4', 'max:100',
                'regex:/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/'],
            'telephone' => ['required', 'numeric', 'phone_number', 'size:11'],
        ]);

        if ($validationRequest->fails()) {
            return redirect()->back()->withErrors($validationRequest->errors());
        }
        else
            Hotel::create([
                'name' => trim($request->get('name')),
                'username' => trim($request->get('username')),
                'password' => trim($request->get('password')),
                'country' => trim($request->get('country')),
                'city' => trim($request->get('city')),
                'district' => trim($request->get('district')),
                'telephone' => trim($request->get('telephone'))
            ]);
        }

}
