<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\New_;
class NewsController1 extends Controller
{
    public function index()
    {
        $data = New_::all();
        return view('news',['news'=>$data]);
    }


}


