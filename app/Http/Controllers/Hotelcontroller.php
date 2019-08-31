<?php

namespace App\Http\Controllers;
use App\Hotel;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Hotelcontroller extends Controller
{
    public function show(){
        if(Auth::check()) {
            $user = Auth::user();
            return view('profile')->with($user);
        }
        else{
            return response('Forbidden', 403);
        }

    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::id();


            $user = $request->all();
            $user['username'] = Auth::user();
            $user->update();
            $user->save();

        } else {
            return response('Forbidden', 403);
        }
    }
    //delete hotels data
        public function delete(Request $request){
            if (Auth::check()) {
                $user['username'] = Auth::user();
                $user->delete();

            }
            else{
                return response('Forbidden', 403);
            }

        }
        //delete hotels_room
    public function deleteroom(Request $request){
        if (Auth::check()) {
            $room = $request->all();
            DB::delete('delete from hotel_room where id = ?',[$room['id']]);

        }
        else{
            return response('Forbidden', 403);
        }

    }



}
