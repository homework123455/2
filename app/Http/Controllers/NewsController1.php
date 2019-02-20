<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController1 extends Controller
{
    public function index()
    {
        $data = News::all();
        return view('news',['news'=>$data]);
    }


}


