<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;



class Hotelcontroller extends Controller
{
    public function registeration(){
        return view('register');
    }


    public function store(Request $request){
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->Hash::make(input('password'));
        $remeber_token = $request->input('remember_token');
        $telephone = $request->input('telephone');
        $district = $request->input('district');
        $city = $request->input('city');
        $country = $request->input('country');

        $data=array("name"=>$name,"username"=>$username,"password"=>$password,"remeber_token"=>$remeber_token,
            "telephone"=>$telephone,"district"=>$district,"city"=>$city,"country"=>$country);
        DB::table('hotel')->insert($data);
        echo "Record inserted successfully.<br/>";

    }
}
