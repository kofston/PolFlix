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

}
