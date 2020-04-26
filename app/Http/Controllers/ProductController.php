<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ProductControllerController;

class ProductController extends Controller
{
    public function __construct()
    {

    }
    public function show_product()
    {
        $m_Product = new Product;
        return view('header').view('product',['prod' => $m_Product]).view('footer');
    }
    public function findVideo()
    {
        $categoryID = Request::input('category_id');
        $finder = new Product;
        $titles = $finder->FindMovie($categoryID);
        return $titles;
    }
    public function like($movie_id = NULL)
    {
        $show_like = DB::table('movies')->where('m_id', $movie_id)->get();
        $like = $show_like[0]->m_like;
        $like=$like+1;
        if(!session_id()) {
            session_start();
        }
        if(isset($_SESSION['Login_id']))
        $put_like = DB::table('movies')->where('m_id', $movie_id)->update(['m_like' => $like]);

        $m_Product = new Product;
        $newURL ='/product/?prod='.$show_like[0]->m_id;
        return redirect()->action('ProductController@show_product',['prod'=>$show_like[0]->m_id]);
    }

}
