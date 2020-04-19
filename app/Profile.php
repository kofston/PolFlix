<?php

namespace App;

use DB;
use Request;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function RentList()
    {

        $List_gen = '';

        $videos_list = DB::table('clients')->where(['c_id'=>$_SESSION['Login_id']])->get();

        foreach ($videos_list as $vl)
        {
            $json_videos_list = (array)json_decode($vl->c_movies_id);

            foreach($json_videos_list as $rent_video_info)
            {
                $movie = DB::table('movies')->where(['m_id'=> $rent_video_info->id])->get();
                $title = $movie[0]->m_title;
                $avatar = $movie[0]->m_image;
                $rent_date  = $rent_video_info->date;
                $rent_days = $rent_video_info->days;
//               ponowna konwersa na datę ( aby czasami nie wystąpił błąd typu )
                $time = strtotime($rent_video_info->date);
                $rent_date = date('d-m-Y',$time);

                $last_time_back_video = date('d-m-Y',strtotime($rent_date.' + '.$rent_days.' days'));
                $str = strtotime(date("d-m-Y",strtotime($last_time_back_video))) - (strtotime($rent_date));
                $how_many_days =  floor($str/3600/24);


//               ((1==1)?'tak':'nie')
                $List_gen .='<tr><td><img src="'.$avatar.'" width="90"></td><td>'.$title.'</td><td>'.$rent_date.'</td><td>'.$last_time_back_video.'</td><td>'.(($how_many_days>0)?$how_many_days.' dni': (($how_many_days==0)?'<span style="color: orange">'.$how_many_days.' !</span>':'<span style="color: red;">'.$how_many_days.' !!!</span>')).'</td></tr>';
            }
        }

        return $List_gen;
    }

    public function UserData()
    {
        $user_data = DB::table('clients')->where(['c_id'=>$_SESSION['Login_id']])->get();

        $how_many_videos = DB::table('clients')->where(['c_id'=>$_SESSION['Login_id']])->get();
        foreach ($how_many_videos as $vl) {
            $json_videos_list = (array)json_decode($vl->c_movies_id);
            $count_mov = count($json_videos_list);
        }
        $name = $user_data[0]->c_first_name;
        $lastname = $user_data[0]->c_last_name;
        if($count_mov==0)
            $const = '<hr style="background-color: white;"><h3>Dane osobowe:</h3><span style="font-size: 22px;">'.$name." ".$lastname.'</span><br><hr style="background-color: white;"><span style="font-size: 22px;">Aktualnie posiadasz : '.$count_mov.' pozycje</span><br><hr style="background-color: white;"><br><form autocomplete="off" type="POST" action="/profile/delete/'.$_SESSION['Login_id'].'"><input type="checkbox" id="del_acc" name="checkbox_delete_acc"/><br>Zgadzam się na usunięcie konta i rozumiem także iż ponowna aktywacja konta w serwisie będzie możliwa po kontakcie z administratorem<br><br><input type="submit" class="button_usun" value="Skasuj konto"/></form>';
        else
            $const = '<hr style="background-color: white;"><h3>Dane osobowe:</h3><span style="font-size: 22px;">'.$name." ".$lastname.'</span><br><hr style="background-color: white;"><span style="font-size: 22px;">Aktualnie posiadasz : '.$count_mov.' pozycje</span><br><hr style="background-color: white;"><br>Nie mozesz usunąć konta posiadając filmy.<br>Oddaj twoje filmy aby móc usunąć konto';

        return $const;
    }
}
