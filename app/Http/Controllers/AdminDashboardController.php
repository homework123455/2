<?php

namespace App\Http\Controllers;

use App\New_;
use App\Application;
use App\Asset;
use App\Week;
use App\Time_;
use App\Maintaince;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
		$maintaincesALL1=Maintaince::orderBy('created_at','DESC');
		$maintaincesALL2=Maintaince::orderBy('created_at','DESC');
		
		
		$maintaincesA=$maintaincesALL1->whereIn('status',array('通過','駁回','申請中'))->get();
		$maintaincesB=$maintaincesALL2->whereIn('status',array('通過','駁回','申請中'))->get();
		$maintainces=$maintaincesALL->whereIn('status',array('申請中'))->get();
		$weeks=Week::orderBy('id','ASC')->get();
		$times=Time_::orderBy('id','ASC')->get();
		$assets=Asset::orderBy('created_at', 'ASC')->get();
		$assets1=Asset::orderBy('created_at', 'ASC');
		$assets2=Asset::orderBy('created_at', 'ASC');
        //$maintainces=$maintaincesALL->whereNotIn('status',array('正常使用中','通過'))->get();
		
        $news = New_::orderBy('created_at', 'DESC')->take(3)->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $departmaentU=$users->where('department_id', Auth::user()->department_id);
		//$time_nowid=Carbon::now('Asia/Taipei');
        $time_nows=date("H:i:s", time()+8*60*60);
		//$time_nows_id=strtotime($time_nows);
		//$time_ids=Time_::find($assets->time_id);
		//foreach($time_nows as $time_now ){
			foreach($times as $time ){
				///$time_start_id=strtotime($time->time_start);
				//$time_end_id=strtotime($time->time_end);
				//if($time_end_id<$time_nows_id && $time_start_id>$time_nows_id){
					//$asset_timestart=$time->time_start;
					if($time->time_end >= $time_nows && $time->time_start <= $time_nows){
					$time_nowid=$time->id;
					//$asset_timeend=$time->time_end;
					}
			else{		
			$time_nowid=Carbon::now('Asia/Taipei');
			//$dt->timezone = new DateTimeZone('Europe/London');

		}
			
		}
        $asset_overtimes=$assets1->where('time_id', '!=', $time_nowid)->where('status','租借中')->get();
		//foreach ($asset_overtimes as $asset_overtime){
		foreach($users as $user){
        if($username==$user->id){
			
		//$user1=User::find($application->user_id);
		$user2=$user->name;
		}
		}
		//}
		$asset_overtimes1=$assets2->where('time_id', '!=', $time_nowid)->where('status','租借中')->where('lendname',$user2)->get();
        $data=['applications'=>$applications,'maintainces'=>$maintainces,'maintainces_A'=>$maintaincesA,
		'maintainces_B'=>$maintaincesB,'assets'=>$assets,
            'applicationsA'=>$applicationsA,'news'=>$news,
            "users"=>$users,'departmaentU'=>$departmaentU,'username'=>$username,'times'=>$times,'weeks'=>$weeks,'asset_overtimes'=>$asset_overtimes,'asset_overtimes1'=>$asset_overtimes1,'time_nowid'=>$time_nowid,'time_nows'=>$time_nows];
        if (Auth::user()->previlege_id==3)
            return view('admin.dashboard.mis',$data);
        elseif(Auth::user()->previlege_id==4)
            return view('admin.dashboard.admin',$data);
        elseif(Auth::user()->previlege_id)
            return view('admin.dashboard.user',$data);

    }
}
