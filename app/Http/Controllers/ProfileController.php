<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $rent_videos_list = new Profile;
        return view('header').view('profile',['rent_list'=>$rent_videos_list]).view('footer');
    }
    public function delete($client_id =NULL)
    {
        $delete = DB::table('clients')->where('c_id', $client_id)->update(['status' => '0']);
        if(!session_id()) {
            session_start();
        }
        session_destroy();
        $movie_list = DB::table('movies')->get();
        return view('header').view('homepage',['movie_list'=>$movie_list]).view('footer');
    }
}
