<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Application;
use App\Asset;
use App\Maintaince;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
   
public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $username=Auth::user()->id;
        $applications=Application::where('user_id', Auth::user()->id)->get();
        $applicationsA=Application::orderBy('created_at', 'DESC')->get();
        $maintaincesALL=Maintaince::orderBy('created_at','DESC');
		//$maintaincesALL1=Maintaince::orderBy('created_at','DESC')->get();
		$maintaincesA=$maintaincesALL->whereIn('status',array('通過','駁回','申請中'))->get();
        $maintainces=$maintaincesALL->whereIn('status',array('申請中'))->get();
		
        $assets=Asset::orderBy('created_at', 'ASC')->get();
        //$maintainces=$maintaincesALL->whereNotIn('status',array('正常使用中','通過'))->get();
        $announcements = Announcement::orderBy('created_at', 'DESC')->take(3)->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $departmaentU=$users->where('department_id', Auth::user()->department_id);


        $data=['applications'=>$applications,'maintainces'=>$maintainces,'maintainces_A'=>$maintaincesA,'assets'=>$assets,
            'applicationsA'=>$applicationsA,'announcements'=>$announcements,
            "users"=>$users,'departmaentU'=>$departmaentU,'username'=>$username];
        if (Auth::user()->previlege_id==3)
            return view('admin.dashboard.mis',$data);
        elseif(Auth::user()->previlege_id==4)
            return view('admin.dashboard.admin',$data);
        elseif(Auth::user()->previlege_id)
            return view('admin.dashboard.user',$data);

    }
}
