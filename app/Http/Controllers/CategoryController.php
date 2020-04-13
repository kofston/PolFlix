<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryControllerController;

class CategoryController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('header').view('category').view('footer');

    }
    public function show_video()
    {
        $categories = DB::table('movies')->where('status','1')->get();
        $m_Category = new Category;

        return view('header').view('category',['movies' => $categories,'m_cat'=>$m_Category]).view('footer');
    }
}
