<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Hotel;

class SearchController extends Controller
{
    public function List(int $start)
    {
        $count = Hotel::count();
        $limit_no=10;

        if($start == 0 || $start <0 || is_int($start) == false){
            $start = 0;

        }elseif ($start > $count){
            $start = $count-10;

        }else{
            $start=floor($start /10)*10;

        }
        $data = DB::table('hotels')->select('name','email','country','city','telephone',
            'district')
            ->orderBy('clicks', 'desc')->offset($start)->limit($limit_no)->get();
        dd($data);
    }
}
