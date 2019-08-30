<?php

namespace App\Http\Controllers;
use App\Hotel;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Hotelcontroller extends Controller
{

    public function update(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::id();
            /*$name = $request->input('name');
            $username = $request->input('username');
            $password = $request->Hash::make(input('password'));
            $remeber_token = $request->input('remember_token');
            $email=$request->input('email');
            $telephone = $request->input('telephone');
            $district = $request->input('district');
            $city = $request->input('city');
            $country = $request->input('country');
            Hotel::update('update hotel set name = ?,username=?,password=?,remember_token=?,email=?,telepone=?,district=?,city=?,country=?
            where id = ?',[$name,$username,$password,$remeber_token,$email,$telephone,$district,$city,$country,$id]);*/

            $user = $request->all();
            $user['id'] = Auth::id();
            $user->update();

        } else {
            return response('Forbidden', 403);
        }
    }
    //delete hotels data
        public function delete(Request $request){
            if (Auth::check()) {
                $id = Auth::id();
                hotel::deleteData($id);

            }
            else{
                return response('Forbidden', 403);
            }

        }
        //delete hotels_room
    public function deleteroom(Request $request){
        if (Auth::check()) {
            $id = Auth::id();
            //hotel::deleteData($id);
            $hotel = hotel::find($id);
            $hotel->hotels()->delete($request);
            //$hotel->delete();

        }
        else{
            return response('Forbidden', 403);
        }

    }



}
