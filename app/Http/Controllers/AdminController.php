<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;
use Request;
use App\Http\Controllers\CategoryControllerController;

class AdminController extends Controller
{
    public function AdminPanel()
    {
        $client_and_value_lists = new Admin;
        return view('header').view('admin',['admin_lists'=>$client_and_value_lists]).view('footer');
    }
    public function send_reminder($client_email=NULL)
    {
        $to      = $client_email;
        $subject = 'Pol-Flix - Upomnienie w sprawie zalegających filmów';
        $message = 'Prosimy o oddanie zalegających filmów! Z góry dziękujemy i Pozdrawiamy!<h2>Zespół PolFlix</h2>';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo 'fdsfds';
    }
    public function delete_movie($movie_id=NULL)
    {
        $client_and_value_lists = new Admin;
        $delete = DB::table('movies')->where('m_id', $movie_id)->update(['status' => '0']);
        return view('header').view('admin',['admin_lists'=>$client_and_value_lists]).view('footer');
    }
    public function add_movie($movie_id=NULL)
    {
        $client_and_value_lists = new Admin;
        if($movie_id!='new')
        {
            $get_video_data = $client_and_value_lists->getEditClientData($movie_id);
        }
        else
        {
            $get_video_data =NULL;
        }
        return view('header').view('add_movie',['admin_lists'=>$client_and_value_lists,'movie_id'=>$movie_id,'video_data'=>$get_video_data]).view('footer');
    }
    public function returnmovie($client_id,$movie_id)
    {
        $returnmovie = new Admin;
        $returnmovie->ReturnMovie($client_id,$movie_id);

        $client_and_value_lists = new Admin;
        return view('header').view('admin',['admin_lists'=>$client_and_value_lists]).view('footer');
    }
    public function add_movie_form()
    {
        $target_dir = "public/images/";
        $title_vid = Request::input('title_new');
//        move image
        $target_file =  $_FILES["avatar_new"]["tmp_name"];
        $BASEPATH = base_path("public\images");

        $image_name = $_FILES["avatar_new"]["name"];
        $newpath =$BASEPATH.'\\'.$_FILES["avatar_new"]["name"];
//        echo $newpath;
//        die();
        move_uploaded_file($target_file, $newpath);

        if($title_vid)
        {
            $movie_id = Request::input('movie_id_new');
            $descripion = Request::input('desc_new');
            $price = Request::input('price_new');
            $category = Request::input('category_new');
            $director = Request::input('director_new');
            $pegi = Request::input('pegi_new');
            $carier = Request::input('carier_new');
            $amount = Request::input('amount_new');
            $avatar = $image_name;
            $trailer = Request::input('trailer_new');
            $movie_id_if_edit = Request::input('movie_id_new');

            $insert_new_movie = new Admin;

            if($movie_id_if_edit == 'new')
            {
                $insert_new_movie->InsertOrUpdateMovie($title_vid,$descripion,$price,$category,$director,$pegi,$carier,$amount,$avatar,$trailer,NULL);

            }
            else
            {
                $insert_new_movie->InsertOrUpdateMovie($title_vid,$descripion,$price,$category,$director,$pegi,$carier,$amount,$avatar,$trailer,$movie_id);
            }
//            echo 'mam forma';
//            echo $movie_id.' '.$descripion.' '.$price.' '.$category.' '.$director.' '.$pegi.' '.$carier.' '.$amount.' '.$amount.' '.$avatar.' '.$trailer.' '.$movie_id_if_edit.' ';
//            die();
        }
        else
        {
            echo 'dada';
        }

        $client_and_value_lists = new Admin;
        return view('header').view('admin',['admin_lists'=>$client_and_value_lists]).view('footer');
    }
}
