<?php

namespace App;

use DB;
use Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function ProductGenerator()
    {
        $actual_prod = Request::input('prod');


        if ($actual_prod == NULL)
            $prod = '1';
        else
            $prod = $actual_prod;

        $movie_query = DB::select("SELECT * from movies WHERE m_id=$prod  AND status=1");

        if ($movie_query[0]->m_carrier == "1") {
            $carrier = '<img src="/images/dvd_logo.png" width="90px" style="padding-right: 30px;">';
        } elseif ($movie_query[0]->m_carrier == "2") {
            $carrier = '<img src="/images/br_logo.png" width="60px">';
        } elseif ($movie_query[0]->m_carrier == "3") {
            $carrier = '<img src="/images/4k_logo.png" width="100px" style="padding-top: 10px;">';
        } elseif ($movie_query[0]->m_carrier == "4") {
            $carrier = '<img src="/images/dvd_logo.png" width="90px" style="padding-right: 30px;"><img src="/images/br_logo.png" width="60px">';
        } elseif ($movie_query[0]->m_carrier == "5") {
            $carrier = '<img src="/images/br_logo.png" width="60px"><img src="/images/4k_logo.png" width="100px" style="padding-top: 10px;">';
        } else {
            $carrier = '<img src="/images/dvd_logo.png" width="90px" style="padding-right: 30px;"><img src="/images/br_logo.png" width="60px"><img src="/images/4k_logo.png" width="100px" style="padding-top: 10px;">';
        }

        $img = $movie_query[0]->m_image;

        $description = $movie_query[0]->m_description;

        $amount = $movie_query[0]->m_amount;

        $trailer = $movie_query[0]->m_trailer;
        $movie_list = '<div style="position: absolute; z-index: 0; width: 84%; height: 88%">
        <iframe frameborder="0" height="100%" width="100%" id="youtube"
                src="https://youtube.com/embed/' . $trailer . '?autoplay=1&loop=1&mute=1&controls=0&showinfo=0&autohide=1">
        </iframe>
    </div>

    <div class="product_box">
        <div class="bar_hidden_yt"></div>
        <div class="product_elements_box">
            <div class="title_box">
                <h1>' . $movie_query[0]->m_title . '</h1>
            </div>
            <div class="picture_box">
            <div class="pegi_vid"><span>' . $movie_query[0]->m_pegi . '</span></div>
                            <div class="price_vid"><span>' . $movie_query[0]->m_price . ' zł/dzień</span></div>
                             <a href="/product/like/'.$movie_query[0]->m_id.'"><div class="like_vid"><span>' . $movie_query[0]->m_like . '</span></div></a>
                <img src="' . $img . '" width="100%">
            </div>
            <div class="description_box">
                <span>' . $description . '</span>
            </div>
            <div class="date_box">
                <div class="row m-0">
                    <div class="col-lg-4 col-m-12 p-0" style="min-height: 100px;">
                    <form action="/rent" METHOD="get" id="rent_form">
                    '.(($amount>0)? '  <button type="submit" class="add_button" data-ident="1">REZERWUJ</input>' : 'BRAK NA STANIE').'
                    </div>
                    <div class="col-lg-4 col-m-12 text-center p_amounts" style="min-height: 100px;">
                        <span> Na stanie ' . $amount . ' szt.</span>
                    </div>
                    <div class="col-lg-4 col-m-12 text-center p_amounts" style="min-height: 100px;">
                        <select class="select_days" name="days" form="rent_form">
                            <option default value="0" class="option_default">Wybierz-czas</option>
                            <option value="1">1 Dzień</option>
                            <option value="2">2 Dni</option>
                            <option value="3">3 Dni</option>
                            <option value="4">4 Dni</option>
                            <option value="5">5 Dni</option>
                        </select>
<input type="hidden" name="movie_id" value="' . $actual_prod . '" form="rent_form">
                         </form>
                    </div>

                </div>

            </div>
        </div>
    </div>';


        return $movie_list;
    }
    public function FindMovie($cat = NULL)
    {
        $movie_query = DB::select("SELECT * from movies WHERE m_category=$cat  AND status=1");
        $titles = '';
        foreach ($movie_query as $mq)
        {

            $titles .='<option value="'.$mq->m_id.'">'.$mq->m_title.'</option>';
        }

        return $titles;
    }
}
