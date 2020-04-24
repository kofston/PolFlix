<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use DB;
class Slider extends Model
{
public function SliderGenerator()
{
    $give_me_movies = DB::table('movies')->where(['status'=>'1'])->limit(3)->get();
    $MOVIES_SLIDER = '';
    $i=1;
    foreach ($give_me_movies as $movie)
    {

        $MOVIES_SLIDER .='<div class="carousel-item '.(($i==1)?'active':'').'">
<iframe width="100%" height="120%" src="https://www.youtube.com/embed/'.$movie->m_trailer.'?&autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="carousel-caption d-md-block">
                                <div class="slider_desc_box">
                                    <div class="slider_desc_header">
                                        <span>'.$movie->m_title.'</span>
                                    </div>
                                    <a href="/product/?prod='.$movie->m_id.'">
                                        <div class="slider_button">
                                            <span>SPRAWDŹ TERAZ</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>';
        $i++;
    }
return $MOVIES_SLIDER;
}

}
