<?php

namespace App\Http\Controllers;
use App\Rent;
use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class RentController extends Controller
{
    public function index()
    {
        $days = Request::input('days');
        if(!session_id()) {
            session_start();
        }
        $id_client = $_SESSION['Login_id'];
        $id_movie = Request::input('movie_id');

        $rent = new Rent;
        $response = $rent->rent_video($id_client,$id_movie,$days);

        if($response==1)
        {
            $movie_list = DB::table('movies')->get();
            $rent = 1;
            return view('header').view('homepage',['movie_list'=>$movie_list]).view('footer',['rent'=>$rent]);
        }
        else
        {
            $movie_list = DB::table('movies')->get();
            $rent = 0;
            return view('header').view('homepage',['movie_list'=>$movie_list]).view('footer',['rent'=>$rent]);
        }
    }
}
