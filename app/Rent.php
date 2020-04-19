<?php

namespace App;

use DB;
use Request;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public function rent_video($client_id = NULL, $movie_id = NULL, $days = NULL)
    {

//        jakie wideo wypożyczone

        $renting_video = DB::table('clients')->select('c_movies_id')->where(['c_id' => $client_id])->get();
//        echo '<pre>' . print_r($renting_video[0]->c_movies_id, TRUE) . '</pre>';
//        die();
        if($renting_video[0]->c_movies_id!= '')
        {

            $renting_video = (array)json_decode($renting_video[0]->c_movies_id);

            foreach ($renting_video as $rv=>$id_vid)
            {
                if ($id_vid->id == $movie_id)
                {
                    return 0;
                }
            }
        }
        else
        {
            $renting_video = array();
        }

        $main_key = "video_".$movie_id;

        $new_key =  "id";
        $new_key_date = "date";
        $new_key_days = "days";

        $renting_video[$main_key] = array($new_key=>$movie_id,$new_key_date=>date('d-m-Y'),$new_key_days=>$days);

//        $renting_video[$new_key] = $movie_id;
//        $renting_video[$new_key_date] = date('d-m-Y');
//        $renting_video[$new_key_days] = $days;


        $renting_video = json_encode($renting_video);
        $put_video = DB::table('clients')->where('c_id', $client_id)->update(['c_movies_id' => $renting_video]);
        $update_amount_sel = DB::table('movies')->select('m_amount')->where('m_id',$movie_id)->get();
        $update_amount = DB::table('movies')->where('m_id',$movie_id)->update(['m_amount'=> ($update_amount_sel[0]->m_amount-1)]);
        return 1;
    }
}
