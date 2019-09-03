<?php

namespace App\Http\Controllers;

use App\Hotel;

class SearchController extends Controller
{
    public $limit_no=10;
    private function listHotels(int $start){
        $count = Hotel::count();


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

        $data = Hotel::select('id','name','desc','username','country','city',
            'district','updated_at')
            ->orderBy('clicks', 'desc')->offset($start)->limit($this->limit_no)->get();
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
        if ($by === "location") {
            $count = Hotel::select('id','name','desc','username','country','city',
                'district','updated_at')
                ->orderBy('clicks', 'desc')->where("country", 'like', $query)->orWhere("city", "like", $query)
                ->orWhere("district", "like", $query)->orderBy('clicks')->count();
        } else {
            $count = Hotel::select('id','name','desc','username','country','city',
                'district','updated_at')
                ->orderBy('clicks', 'desc')->where("name", "=", $query)->orderBy('clicks')->count();

            }
        if($start === 0 || $start <0 || is_int($start) === false){
            $start = 0;

        }elseif (($start-1)*10 > $count){
            $start = floor($count/10)*10;

        }else{
            $start=($start-1)*10;
        }

        if ($by === "location"){
            $data = Hotel::select('id','name','desc','username','country','city',
                'district','updated_at')
                ->orderBy('clicks', 'desc')->where("country", 'like', $query)->orWhere("city", "like", $query)
                ->orWhere("district", "like", $query)->orderBy('clicks')->offset($start)->limit($this->limit_no)->get();
        }
        else{
            $data = Hotel::select('id','name','desc','username','country','city',
                'district','updated_at')
                ->orderBy('clicks', 'desc')->where("name", "like", $query)->orderBy('clicks')->offset($start)->limit($this->limit_no)->get();
        }

        $next = $start + 10 >= $count ? false : true;
        $prev = $start < 10 ? false : true;
        $pages = ceil($count / 10);
        $currentPage = ($start / 10) + 1;
//        dd($next);
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

    public function Listing(int $start = 1)
    {
        if (isset($_GET['q'])){
            if (isset($_GET['searchBy']))
                $searchBy = $_GET['searchBy']?$_GET['searchBy']:'name';
            else
                $searchBy = 'name';
            return $this->searchHotels('%'.trim($_GET['q']).'%', $searchBy, $start);
        }
        else
            return $this->listHotels($start);

    }
}
