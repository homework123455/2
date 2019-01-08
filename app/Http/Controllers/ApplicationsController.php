<?php

namespace App\Http\Controllers;

use App\Application;
use App\Asset;
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
        $asset=Asset::find($id);

        $data = ['asset' => $asset
            //,'application'=>$asset->Maintainces->applications
        ];
        return view('admin.assets.application', $data);
    }


}
