<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulController extends Controller
{
    public function index()
    {
        return view('header').view('regul').view('footer');
    }
}
