<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Category extends Model
{
    public function ActualCategory()
    {
        $act_cat=Request::input('cat');
        if($act_cat=='1')
            $act_cat="Filmy akcji";
        elseif ($act_cat=='2')
            $act_cat="Komedie";
        elseif ($act_cat=='3')
            $act_cat="Filmy Przygodowe";
        return $act_cat;
    }

    public function cat_list()
    {

//        $actual_category = $request->has('cat');
        $actual_category= Request::input('cat');
        if($actual_category == NULL )
            $category='';
        else
            $category=$actual_category;

        $movies_query = DB::select("SELECT * from movies WHERE m_category=$category  AND status=1");

        $empty = 'ds';

        $movie_list = '';


        $counter =1;
        foreach ($movies_query as $key=>$value)
        {

            if($value->m_image!='0')
                $url = $value->m_image;
            else
                $url = '';


            if(($counter == 3)||($counter == 4)||($counter == 9)||($counter == 10))
            {
                $movie_list .= '<div class="grid-item grid-item--height1 grid-item--width2 overflow-hidden" >
                <a href="/product/?prod='.$value->m_id.'" title="'.$value->m_title.'">
                    <div class="title_place" >'.$value->m_title.'</div>
                <img class="img_title" src="'.$url.'">
                </a>
            </div>';
            }
            else
            {
                $movie_list .= '<div class="grid-item grid-item--height2 overflow-hidden" >
                <a href="/product/?prod='.$value->m_id.'" title="'.$value->m_title.'">
                    <div class="title_place" >'.$value->m_title.'</div>
                <img class="img_title" src="'.$url.'">
                </a>
            </div>';
            }
            $counter++;

        }

        return $movie_list;

    }
}
