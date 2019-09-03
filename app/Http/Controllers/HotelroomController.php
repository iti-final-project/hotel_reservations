<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HotelroomController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $hotelID = Auth::id();
        $roomID = $request->input('room_id');
        $validateRequest = Validator::make($data,[
            'room_id'=> ['required','numeric',
                Rule::unique('hotel_rooms')->where(function ($query) use($hotelID, $roomID){
                return $query->where('hotel_id', $hotelID)
                    ->where('room_id', $roomID);
            })],
            'addNumber' => ['required','numeric','gte:0'],
            'addPrice' => ['required','numeric','gt:0'],
        ]);

        if($validateRequest->fails())
            return back()->withErrors($validateRequest->errors());

        $room = new HotelRoom();
        $room->hotel_id = $hotelID;
        $room->room_id = $roomID;
        $room->number = $request->input('addNumber');
        $room->price = $request->input('addPrice');
        if($room->save()) {
            Hote::find(Auth::id())->touch();
            return back()->with(['added' => true]);
        }
        return back()->with(['added'=>false]);
    }

    public function update(Request $request){
        $data = $request->all();
        $validateRequest = Validator::make($data,[
            'number' => ['required','numeric','gte:0'],
            'price' => ['required','numeric','gt:0'],
        ]);

        if($validateRequest->fails())
            return response()->json('failed');

        $roomID = $request->input('room_id');
        $user = Hotel::find(Auth::id());
        $room = $user->rooms->where('room_id', $roomID)->first();
        $room -> number = $request -> input('number');
        $room -> price = $request -> input('price');

        if ($room->update()) {
            $user->touch();
            return response()->json('modified');
        }
        return response() -> json('failed');
    }

    public function delete(Request $request){
        $roomID = $request->input('room_id');
        $user = Hotel::find(Auth::id());
        if($user->rooms->where('room_id', $roomID)->first()->delete()) {
            $user->touch();
            return response()->json('deleted');
        }
        return response()->json('failed');
    }
}
