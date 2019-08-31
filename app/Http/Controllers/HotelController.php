<?php
namespace App\Http\Controllers;
use App\Hotel;
use DB;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class HotelController extends Controller
{
    public function show($username){
        $user = Hotel::where('username',$username)->first();
        return view('profile')->with(['hotel'=>$user]);
    }
    public function update(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::id();

            $name = $request->input('name');
            $username = $request->input('username');
            $email = $request->input('email');
            $email = $request->input('email');
            $password = make::hash($request->input('password'));
            $country = $request->input('country');
            $city = $request->input('city');
            $district = $request->input('district');
            $telephone = $request->input('telephone');
            $room_id = $request->input('room_id');
            $price = $request->input('price');
            $number = $request->input('number');
            $user=array('name'=>$name,"username"=>$username,"email"=>$email,"password"=>$password,"country"=>$country,
                "city"=>$city,"district"=>$district,"telephone"=>$telephone,"room_id"=>$room_id,"price"=>$price,"number"=>$number);
            //$user = $request->all();
            $user['username'] = Auth::user();
            $user->update();
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
