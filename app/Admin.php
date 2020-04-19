<?php

namespace App;

use DB;
use Request;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function ReturnMovie($client_id,$movie_id)
    {
        echo 'rere';
        $client_list = DB::table('clients')->where(['status' => '1','c_id'=>$client_id])->get();

        foreach ($client_list as $cl) {
            $client_id = $cl->c_id;
            $client_email = $cl->c_email;
            $TITLE_MOVIES_ARR = array();
            $json_videos_list = (array)json_decode($cl->c_movies_id);
            $po_terminie = '';
            unset($json_videos_list['video_'.$movie_id]);
            $json_videos_list = json_encode($json_videos_list);
            $put_video = DB::table('clients')->where('c_id', $client_id)->update(['c_movies_id' => $json_videos_list]);

            return 1;
        }
    }
    public function ClientList()
    {

        $client_list = DB::table('clients')->where(['status' => '1'])->get();
        $client_list_tab = '';
        foreach ($client_list as $cl) {
            $client_id = $cl->c_id;
            $client_email = $cl->c_email;
            $TITLE_MOVIES_ARR = array();
            $json_videos_list = (array)json_decode($cl->c_movies_id);
            $po_terminie = '';
            foreach ($json_videos_list as $json_list) {
                $id = $json_list->id;
                $date = $json_list->date;
                $days = $json_list->days;

//                Wyliczanie czy po terminie

//  ponowna konwersa na datę ( aby czasami nie wystąpił błąd typu )
                $time = strtotime($date);

                $rent_date = date('d-m-Y', $time);

                $last_time_back_video = date('d-m-Y', strtotime($rent_date . ' + ' . $days . ' days'));
                $str = strtotime(date("d-m-Y", strtotime($last_time_back_video))) - (strtotime($rent_date));
                $how_many_days = floor($str / 3600 / 24);
//                echo $how_many_days.'<br>';



                $now = time(); // or your date as well
                $your_date = strtotime($last_time_back_video);
                $datediff = $now - $your_date;

                 $how_many_days = round($datediff / (60 * 60 * 24)).'<br>';


                if ($how_many_days > 0 && $how_many_days!= 1)
                    $po_terminie .= "<span class='red'>TAK!</span>"."<a href='/admin/return/" . $client_id . "/".$id."'><i class=\"fas fa-exchange-alt\"></i></a><br><br>";
                elseif ($how_many_days == 1)
                    $po_terminie .= "<span class='orange'>Upływa dziś !</span>"."<a href='/admin/return/" . $client_id . "/".$id."'><i class=\"fas fa-exchange-alt\"></i></a><br><br>";
                else
                    $po_terminie .= "<span class='green'>NIE</span>"."<a href='/admin/return/" . $client_id . "/".$id."'><i class=\"fas fa-exchange-alt\"></i></a><br><br>";

                $this_film = DB::table('movies')->where(['m_id' => $id])->get();

                foreach ($this_film as $tflm) {
                    $title_vid = $tflm->m_title;
                    array_push($TITLE_MOVIES_ARR, $title_vid);
                }
            }
            $name = $cl->c_first_name;
            $last_name = $cl->c_last_name;
            $nick = $cl->c_login;

//            Twórz liste tytułów
            $titles_movies = '';
            foreach ($TITLE_MOVIES_ARR as $TMA) {
                $titles_movies .= $TMA . '<br><br>';
            }
            $client_list_tab .= '<tr><td>' . $name . '<br>' . $last_name . '<br>(' . $nick . ')</td><td>' . $titles_movies . '</td><td>' . $po_terminie . '</td><td><a href="/admin/send_reminder/' . $client_email . '" class="margin_4" title="Wyślij upomnienie"><i class="fas fa-bell-exclamation red"></i></a><a href="/profile/delete/' . $client_id . '" class="margin_4" title="Usuń użytkownika"><i class="fas fa-user-slash red"></i></a></td></tr>';
        }
        $client_list_tab .= '</table>';
        return $client_list_tab;

    }

    public function MoviesList()
    {
        $add_new = '<tr><td colspan="6"><a style="font-size:50px;" href="/admin/add_movie/new"><i class="far fa-plus-square red"></i></a></td></tr>';
        $all_movies = DB::table('movies')->where(['status' => '1'])->get();
        $movies_list = '';
        foreach ($all_movies as $am) {
//            echo '<pre>' . print_r($am, TRUE) . '</pre>';
            $id = $am->m_id;
            $avatar = $am->m_image;
            $title = $am->m_title;
            $desc = $am->m_description;
            $director = $am->m_director;
            $amount = $am->m_amount;
            $movies_list .= '<tr><td><img width="70px;" title="avatar" src="' . $avatar . '" /></td><td>' . $title . '</td><td>' . $desc . '</td><td>' . $director . '</td><td>' . $amount . '</td></td><td><a href="/admin/add_movie/' . $id . '" class="margin_4" title="Edytuj film"><i class="far fa-edit red"></i></a><a href="/admin/delete_movie/' . $id . '" class="margin_4" title="Usuń film"><i class="fas fa-trash-alt red"></i></a></td></tr>';
        }
        return  $add_new.$movies_list;
    }

    public function InsertOrUpdateMovie($title_model = NULL, $desc_model = NULL, $price_model = NULL, $category_model = NULL, $director_model = NULL, $pegi_model = NULL, $carier_model = NULL, $amount_model = NULL, $avatar_model = NULL, $trailer_model = NULL, $movie_id_model = NULL)
    {

        $descripion = $desc_model;
        $price = $price_model;
        $category = $category_model;
        $director = $director_model;
        $pegi = $pegi_model;
        $carier = $carier_model;
        $amount = $amount_model;
        $avatar = '/images/' . $avatar_model;
        $trailer = $trailer_model;

        $title_vid = $title_model;

        if ($movie_id_model != NULL) {
            $new_movie = DB::table('movies')->where('m_id', $movie_id_model)->update(['m_title' => $title_vid, 'm_description' => $descripion, 'm_price' => $price, 'm_category' => $category, 'm_director' => $director, 'm_pegi' => $pegi, 'm_carrier' => $carier, 'm_amount' => $amount, 'm_image' => $avatar, 'm_trailer' => $trailer, 'updated_at' => date('Y-m-d')]);
        } else {
            $new_movie = DB::table('movies')->insertGetId(
                ['m_title' => $title_vid, 'm_description' => $descripion, 'm_price' => $price, 'm_category' => $category, 'm_director' => $director, 'm_pegi' => $pegi, 'm_carrier' => $carier, 'm_amount' => $amount, 'm_image' => $avatar, 'm_trailer' => $trailer, 'created_at' => date('Y-m-d'), 'status' => '1']
            );
        }

    }

    public function getEditClientData($movie_id = NULL)
    {
        if ($movie_id != NULL) {
            $get_info_about_movie = DB::table('movies')->where(['m_id' => $movie_id])->get();

            foreach ($get_info_about_movie as $get_info)
            {
                $title = $get_info->m_title;
                $descripion = $get_info->m_description;
                $price = $get_info->m_price;
                $category = $get_info->m_category;
                $director = $get_info->m_director;
                $pegi = $get_info->m_pegi;
                $carier = $get_info->m_carrier;
                $amount = $get_info->m_amount;
                $avatar = $get_info->m_image;
                $trailer = $get_info->m_trailer;

                $movie_data = array(
                    'title'=>$title,
                    'description'=>$descripion,
                    'price'=>$price,
                    'category'=>$category,
                    'director'=>$director,
                    'pegi'=>$pegi,
                    'carrier'=>$carier,
                    'amount'=>$amount,
                    'avatar'=>$avatar,
                    'trailer'=>$trailer
                );

                return $movie_data;
            }

        }
    }
}
