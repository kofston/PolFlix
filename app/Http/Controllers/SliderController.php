<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $slider_gen = new Slider;
        $slider_gen = $slider_gen->SliderGenerator();
        return view('header').view('homepage',['slider_generator'=>$slider_gen]).view('footer');
    }
}
