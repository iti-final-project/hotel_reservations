<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use  App\Hotel;
use Illuminate\Validation\Rule;

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

    public function register(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        return $this->registered($request , $user)
            ?: redirect($this->redirectPath());
            }

    protected function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'string'],
            'username' => ['required', 'string',  'min:5', 'unique:hotels','not_regex:/^(\d)/','regex:/^(\w)+$/'],
            'email' => ['required', 'string', 'email', 'unique:hotels'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', 'confirmed', 'string'],
            'country' => ['required'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'telephone' => ['required', 'numeric'],
            'licence'=>'required'
        ]);
    }

    protected function create(array $data){
        return Hotel::create([
            'name'=>$data['name'],
            'username'=>strtolower($data['username']),
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'country'=>$data['country'],
            'city'=>$data['city'],
            'district'=>$data['district'],
            'telephone'=>$data['telephone'],

        ]);
    }


}
