<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function List(int $click_no)
    {
        $count = DB::table('hotels')->count();
        $limit_no=10;

        if($click_no == 0 || $click_no <0 || is_int($click_no) == false){
            $click_no = 0;

        }elseif ($click_no > $count){
            $click_no = $count-10;

        }else{
            $click_no=floor($click_no /10)*10;

        }
        $data = DB::table('hotels')->select('name','email','country','city','telephone',
            'district')
            ->orderBy('clicks', 'desc')->offset($click_no)->limit($limit_no)->get();
        dd($data);
    }
}
