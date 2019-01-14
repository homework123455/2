<?php

namespace App\Http\Controllers;

use App\Application;
use App\Place;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create($id)
    {
        $place=Place::find($id);

        $data = ['place' => $place
            //,'application'=>$place->Maintainces->applications
        ];
        return view('admin.places.application', $data);
    }


}
