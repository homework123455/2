<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\New_;

class NewsDetailController extends Controller
{
      public function news($id)
    {
        $data = New_::where('id',$id)->get();
        return view('news-details',['news'=>$data]);
    }
}


