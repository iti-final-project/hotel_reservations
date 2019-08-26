<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function List(int $click_no)
    {
        if($click_no == 0){
            $click_no=0;
            $data = DB::table('hotels')->orderBy('clicks', 'desc')->offset($click_no)->limit(10)->get();
        }elseif ($click_no <0){
            $click_no=0;
            $data = DB::table('hotels')->orderBy('clicks', 'desc')->offset($click_no)->limit(10)->get();
        }else{
            $click_no=floor($click_no /10);
            $data = DB::table('hotels')->orderBy('clicks', 'desc')->offset($click_no)->limit(10)->get();
        }

        dd($data);
    }
}
