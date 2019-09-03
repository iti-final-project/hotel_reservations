<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class HotelController extends Controller
{
    public function show($username){
        $user = Hotel::where('username',$username)->first();
        return view('profile')->with(['hotel'=>$user]);
    }

    public function showAuth(Request $request){
        $user = Hotel::find(Auth::id());
        switch ($request->route()->getName()){
            case 'settings':
                $countries = json_decode(file_get_contents("http://country.io/names.json"),true);
                sort($countries);
                return view('settings.updateAbout')->with(['hotel'=>$user,'countries'=>$countries]);
                break;
            case 'hotel_room':
                return view('settings.updateRooms')->with(['rooms'=>$user->rooms,'dbRooms'=> Room::all()]);
                break;
            case 'passwordChange':
                return view('settings.updatePassword');
                break;

        }

    }

    public function updateAbout(Request $request)
    {
        $user = Hotel::find(Auth::id());

        $data = $request->all();

        $email = $request->input('email') === $user->email?"":"unique:hotels";

        $validateRequest = Validator::make($data,[
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'email' => ['required', 'string', 'email',"$email"],
            'country' => ['required'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'telephone' => ['required', 'numeric'],
        ]);

        if($validateRequest->fails()){
            return redirect()->back()->with(['updated'=>false]);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->district = $request->input('district');
        $user->telephone = $request->input('telephone');
        $user->desc=$request->input("desc");
        if($user->update())
            return redirect()->back()->with(['updated'=>true]);
        return redirect()->back()->with(['updated'=>false]);

    }
    //delete hotels data
    public function delete(Request $request){
        $user = Hotel::find(Auth::id());
        if(Storage::disk('public')->exists($user->username)){
            if(!(Storage::disk('public')->delete($user->username)))
                return back()->withErrors(['Deleted'=>"Couldn't delete all hotel data, Please try again later."]);
        }
        $user->rooms->delete();
        $user->images->delete();
        if($user->delete())
            return response()->json('deleted');
        return response()->json('failed');
    }
}
