<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Hotel;

class SearchController extends Controller
{
    private function listHotels(int $start){
        $count = Hotel::count();
        $limit_no=10;

        if($start === 0 || $start <0 || is_int($start) === false){
            $start = 0;

        }elseif (($start-1)*10 > $count){
            $start = floor($count/10)*10;

        }else{
            $start=($start-1)*10;

        }
        $next = $start+10>=$count?false:true;
        $prev = $start<10?false:true;
        $pages = ceil($count/10);
        $currentPage = ($start/10)+1;

        $data = DB::table('hotels')->select('name','desc','username','country','city',
            'district','updated_at')
            ->orderBy('clicks', 'desc')->offset($start)->limit($limit_no)->get();
        return view('listing.listing')
            ->with(
                [
                    'hotels' => $data,
                    'next' => $next,
                    'prev' => $prev,
                    'pages' => $pages,
                    'currentPage' => $currentPage
                ]);
    }

    // Not written yet
    private function searchHotels($query, $by, $start){
        return response([$query,$by,$start],200);
    }

    public function Listing(int $start = 1)
    {
        if (isset($_GET['q'])){
            if (isset($_GET['searchBy']))
                $searchBy = $_GET['searchBy']?$_GET['searchBy']:'name';
            else
                $searchBy = 'name';
            return $this->searchHotels($_GET['q'], $searchBy, $start);
        }
        else
            return $this->listHotels($start);

    }
}
