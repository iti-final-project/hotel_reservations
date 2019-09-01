<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Hotel;

class SearchController extends Controller
{
//start deh bta3t el pagination bta3t 2wal saf7a
    public function Listing(int $start = 1)
    {
        if (isset($_GET['q'])) {
            $query = $_GET['q'];
            if (isset($_GET['searchBy'])) {
                $by = $_GET['searchBy'] ? $_GET['searchBy'] : 'name';
                if ($by === "location") {
                    $data = Hotel::where("country", 'like', $query)->orWhere("city" ,"like" ,$query)
                    ->orWhere("district","like",$query)->orderBy('clicks')->offset($start);
                    $count = $data->count();
                } else {
                    $data = Hotel::select("name")->where("name", "=", $query)->orderBy('clicks')->offset($start);
                    $count = $data->count();
                }

            } else {
                $count = Hotel::count();
                $limit_no = 10;

                if ($start === 0 || $start < 0 || is_int($start) === false) {
                    $start = 0;

                } elseif (($start - 1) * 10 > $count) {
                    $start = floor($count / 10) * 10;

                } else {
                    $start = ($start - 1) * 10;
                }

                $data = Hotel::select('id', 'name', 'desc', 'username', 'country', 'city',
                    'district', 'updated_at')
                    ->orderBy('clicks', 'desc')->offset($start)->limit($limit_no)->get();

            }
            $next = $start + 10 >= $count ? false : true;
            $prev = $start < 10 ? false : true;
            $pages = ceil($count / 10);
            $currentPage = ($start / 10) + 1;

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
    }
}
