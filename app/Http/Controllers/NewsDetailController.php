<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsDetailController extends Controller
{
      public function news($id)
    {
        $data = News::where('id',$id)->get();
        return view('news-details',['news'=>$data]);
    }
}


