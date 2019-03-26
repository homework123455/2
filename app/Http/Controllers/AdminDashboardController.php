<?php

namespace App\Http\Controllers;
use App\Order;
use App\OrdersDetail;
use App\New_;
use App\Application;
use App\Place;
use App\Week;
use App\Time_;
use App\Maintaince;
use App\User;
use App\Setting;
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
    
	/*
	public function index1($id)
    {
		        $news = New_::orderBy('created_at', 'DESC')->take(3)->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
		
		$orders = Order::orderBy('created_at','DESC')->get();
		$order_users = Order::where('users_id',Auth::user()->id)->get();
        $ordersdetails = OrdersDetail::orderBy('id' ,'DESC') ->get();
		$order_numbers = OrdersDetail::find($id);
		$data=['orders'=>$orders,'ordersdetails'=>$ordersdetails,'order_users'=>$order_users,'order_numbers'=>$order_numbers,'news'=>$news,
            "users"=>$users];
if (Auth::user()->previlege_id==3)
            return view('admin.dashboard.mis',$data);
        elseif(Auth::user()->previlege_id==4)
            return view('admin.dashboard.admin',$data);
        elseif(Auth::user()->previlege_id)
            return view('admin.dashboard.user',$data);

	}
	*/
    public function index()
    {
		//$order_numbers = OrdersDetail::find($id);
        $username=Auth::user()->id;
        $applications=Application::where('user_id', Auth::user()->id)->get();
        $applicationsA=Application::orderBy('created_at', 'DESC')->get();
        $maintaincesALL=Maintaince::orderBy('created_at','DESC');
		$maintaincesALL1=Maintaince::orderBy('created_at','DESC');
		$maintaincesALL2=Maintaince::orderBy('created_at','DESC');

		
		$maintaincesA=$maintaincesALL1->whereIn('status',array('通過','駁回','申請中'))->get();
		$maintaincesB=$maintaincesALL2->whereIn('status',array('通過','駁回','申請中'))->get();
		$maintainces=$maintaincesALL->whereIn('status',array('申請中'))->get();
		$C_orders=Order::whereIn('status',array('取消審核中'))->get();
		$weeks=Week::orderBy('id','ASC')->get();
		$times=Time_::orderBy('id','ASC')->get();
		$places=Place::orderBy('created_at', 'ASC')->get();
		$places1=Place::orderBy('created_at', 'ASC');
		$places2=Place::orderBy('created_at', 'ASC');
        //$maintainces=$maintaincesALL->whereNotIn('status',array('正常使用中','通過'))->get();
		
        $news = New_::orderBy('created_at', 'DESC')->take(3)->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
		
		$orders = Order::orderBy('created_at','DESC')->get();
		$order_users = Order::where('users_id',Auth::user()->id)->get();
        $ordersdetails = OrdersDetail::orderBy('id' ,'DESC') ->get();
		$ordersapplys=Order::where('status',"未處理")->get();
        $departmaentU=$users->where('department_id', Auth::user()->department_id);
		//$time_nowid=Carbon::now('Asia/Taipei');
        $time_nows=date("H:i:s", time());
		//$time_nows_id=strtotime($time_nows);
		//$time_ids=Time_::find($places->time_id);
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
			
			
		}
		//if(!isset($time_nows)){		
			$time_nowid=Carbon::now();
			//$dt->timezone = new DateTimeZone('Europe/London');

		//}
        $place_overtimes=$places1->where('time_id', '!=', $time_nowid)->where('status','租借中')->get();
		//foreach ($place_overtimes as $asset_overtime){
		foreach($users as $user){
        if($username==$user->id){
			
		//$user1=User::find($application->user_id);
		$user2=$user->name;
		}
		}
		//}
		$place_overtimes1=$places2->where('time_id', '!=', $time_nowid)->where('status','租借中')->where('lendname',$user2)->get();
        $data=['ordersapplys'=>$ordersapplys,'C_orders'=>$C_orders,'orders'=>$orders,'ordersdetails'=>$ordersdetails,'order_users'=>$order_users,'applications'=>$applications,'maintainces'=>$maintainces,'maintainces_A'=>$maintaincesA,
		'maintainces_B'=>$maintaincesB,'places'=>$places,
            'applicationsA'=>$applicationsA,'news'=>$news,
            "users"=>$users,'departmaentU'=>$departmaentU,'username'=>$username,'times'=>$times,'weeks'=>$weeks,'place_overtimes'=>$place_overtimes,
            'place_overtimes1'=>$place_overtimes1,'time_nowid'=>$time_nowid,'time_nows'=>$time_nows];
        if (Auth::user()->previlege_id==3)
            return view('admin.dashboard.mis',$data);
        elseif(Auth::user()->previlege_id==4)
            return view('admin.dashboard.admin',$data);
        elseif(Auth::user()->previlege_id)
            return view('admin.dashboard.user',$data);

    }
	public function edit()
	{
		
		$good=Setting::where('id',1)->value('goods');
		$order=Setting::where('id',1)->value('orders');
		$price=Setting::where('id',1)->value('prices');
		$low_price=Setting::where('id',1)->value('low_prices');
		$data = ['good'=>$good,'order' => $order,'price'=>$price,'low_price'=>$low_price];
		
		return view('admin.setting.edit', $data);
	}
	public function update(Request $request)
    {

        $set = Setting::where('id',1);
			
        $set->update([
            'goods' => $request->goods,
            'orders' => $request->orders,
			'prices'=>$request->price,
			'low_prices'=>$request->low_price
            
        ]);

        return redirect()->route('admin.places.index');
    }
}
