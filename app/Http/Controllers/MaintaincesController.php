<?php

namespace App\Http\Controllers;

use App\Application;
use App\Asset;
//use App\times;
use App\Category;
use App\Maintaince;
use App\MaintainceItem;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MaintaincesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create($id)
    {
        $asset=Asset::find($id);
        $category=Category::find($asset->category);
        $user=User::find($asset->keeper);
        $data = ['asset' => $asset,'category'=>$category,'user'=>$user];
        return view('admin.assets.application', $data);
    }

    public function store(Requests\ApplicationRequest $request,$id)
    {
		
		$user_id=Auth::user()->id;
		
        $asset=Asset::find($id);
        if($asset->status=='正常使用中'){
            $asset->maintainces()->create([
                //'vendor_id'=>$asset->vendor,
                'status'=>'申請中',
                //'method'=>'未選擇',
                'remark'=>null,
				'date'=>Carbon::now(),
				'user_id'=>$user_id
            ]);
            //
			$users=User::orderBy('created_at','DESC')->get();
			/*
		$maintaince=Maintaince::find($id);
		$applications=$maintaince->applications()->get();
		//$applications1=Maintaince::find($maintaince->user_id);
        
		foreach ($applications as $application){
		foreach($users as $user){
        if($application->user_id==$user->id){
			
		//$user1=User::find($application->user_id);
		$user2=$user->name;
		}
		}
		}*/
		
		foreach($users as $user){
        if($user_id==$user->id){
            $user2=$user->name;
		}
		}
            $asset->update([
			
			'lendable'=>'0',
            'status'=>'申請中',
			'lendname'=>$user2
            ]);
			
            $maintainces=Maintaince::orderBy('created_at', 'DESC')->first();
            $maintainces->applications()->create([
                'user_id'=>$request->user()->id,
                'problem'=>$request->problem,
                'date'=>Carbon::now()
            ]);
			/*
			$asset->lendings()->create([
            'user_id'=>$request->user()->id,
            'lenttime'=> Carbon::now(),
			
        ]);
		*/
			/*
            //Mail
            $users=User::where('previlege_id',3)->get();
            $userk=User::find($asset->keeper);
            foreach ($users as $user)
            {
                $to = ['email'=>$user->email,
                    'name'=>$user->name];
                $data = [
                    'name'=>$asset->name,
                    'location'=>$asset->location,
                    'keeper'=>$userk->name,
                    'applications_user'=>Auth::user()->name,
                    'problem'=>$request->problem,
                ];
                Mail::later(1,' admin.mails.application',$data, function($message) use ($to) {
                    $message->to($to['email'], $to['name'])->subject('有新的報修訊息');
                });
            }
			*/
        }
        return redirect()->route('admin.assets.index');
    }

    public function index()
    {
        $maintainces=Maintaince::orderBy('created_at', 'DESC')->whereNotIn('status',['通過'])->get();
        $maintaincesA=Maintaince::orderBy('created_at', 'DESC')->where('status','申請中')->get();
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $applications=Application::orderBy('created_at', 'DESC')->get();
        $data=['maintainces'=>$maintainces,
            'maintaincesA'=>$maintaincesA,
            'applications'=>$applications,
            'assets'=>$asset
        ];
        return view('admin.maintainces.index', $data);
    }
/*
    public function Search(Request $request)
    {
        $Search =$request->input('Search');
        $asset = Asset::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['assets'=>$asset,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }
*/
    public function show($id){
        $maintaince=Maintaince::find($id);
        $asset=Asset::find($maintaince->asset_id);
		$user_id=Auth::user()->id;
		$user1=Maintaince::orderBy('created_at', 'DESC')->where('user_id',$user_id)->get();
		$category=Category::orderBy('created_at' ,'DESC') ->get();
       // $vendors=Vendor::orderBy('created_at','DESC')->get();
        $applications=$maintaince->applications()->get();
		//$applications1=Maintaince::find($maintaince->user_id);
        $users=User::orderBy('created_at','DESC')->get();
		foreach ($applications as $application){
		foreach($users as $user){
        if($application->user_id==$user->id){
			
		//$user1=User::find($application->user_id);
		$user2=$user->name;
		}
		}
		}
		////////////
		$asset1=Asset::orderBy('created_at', 'DESC')->where('lendname','=',$user2)->get();
        //$user=User::find($applications->user_id);
		//$user_name=User::find($user_id->name);
		//$times=User::find($user->times);
		//$times=User::where('name',$users->name)->get();
		//$times=Maintaince::find($id);
		////////////
        //$maintainceitems=MaintainceItem::orderBy('created_at', 'ASC')->get();
        //$assetmaintainces=Maintaince::where('asset_id',$asset->id)->where('status','已完成維修')->get();
      /*
        if($maintaince->status=='申請中'){
            $maintaince->update([
                'status'=>'申請待處理'
            ]);*/
			/*
            //Mail
            foreach ($applications as $application){
            $user=User::find($application->user_id);
                $to = ['email'=>$user->email,
                    'name'=>$user->name
					
					];
                $data=[];
                Mail::later(1,' admin.mails.status',$data, function($message) use ($to) {
                    $message->to($to['email'], $to['name'])->subject('MIS人員已閱讀過');
                });
            }
        }
*/
        $data=['maintaince'=>$maintaince,'asset'=>$asset,'applications'=>$applications,'users'=>$users,
                'asset1'=>$asset1,'categories'=>$category,'user_id'=>$user_id];
        return view('admin.maintainces.show', $data);
    }

    public function process(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $maintaince->update([
            'method'=>$request->method
        ]);
        if($request->method=='是'){
            $asset=Asset::find($maintaince->asset_id);
            $maintaince->update([
                'status'=>'通過',
                'date'=>Carbon::now(),
				'lenttime'=>Carbon::now()
            ]);
            $asset->update([
                'status'=>'租借中',
				'lendable'=>'0'
            ]);
        }elseif($request->method=='否'){
			$asset=Asset::find($maintaince->asset_id);
            $maintaince->update([
                'status'=>'駁回',
				'lendable'=>'1',
				
            ]);
			$asset->update([
                'status'=>'正常使用中',
				'lendable'=>'1',
				'lendname'=>NULL
            ]);
        }
        //Mail
		/*
        foreach ($maintaince->applications()->get() as $application){
            $user=User::find($application->user_id);
            $to = ['email'=>$user->email,
                'name'=>$user->name];
            $data=[];
            Mail::later(1,' admin.mails.status',$data, function($message) use ($to) {
                $message->to($to['email'], $to['name'])->subject('申請通過');
            });
        }
*/
        return redirect()->route('admin.maintainces.index');
    }

    public function complete(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $asset=Asset::find($maintaince->asset_id);
        /*$maintaince->update([
            'status'=>'已完成維修',
            'date'=>Carbon::now()
        ]);*/
        $asset->update([
            'status'=>'正常使用中'
        ]);
		/*
        //Mail
        foreach ($maintaince->applications()->get() as $application){
            $user=User::find($application->user_id);
            $to = ['email'=>$user->email,
                'name'=>$user->name];
            $data = [
                'name'=>$asset->name,
                'date'=>Carbon::now(),
            ];
            Mail::later(1,' admin.mails.complete',$data, function($message) use ($to) {
                $message->to($to['email'], $to['name'])->subject('報修的資產已完成維修');
            });
        }


        $maintainceitems=$maintaince->maintainceitems()->get();
            $to = ['email'=>'moneyyinsh001@gmail.com',
                'name'=>'shark'];
            $data = ['maintainceitems'=>$maintainceitems,
                'name'=>$asset->name,
                'location'=>$asset->location,
                'total'=>$maintainceitems->sum('amount'),
            ];
            Mail::later(1,' admin.mails.spend',$data, function($message) use ($to) {
                $message->to($to['email'], $to['name'])->subject('報修明細');
            });
*/

        return redirect()->route('admin.maintainces.index');
    }


    public function mail($id){

        $maintaince=Maintaince::find($id);
        $application=$maintaince->applications()->get();
        $asset=Asset::find($maintaince->asset_id);
        $users=User::orderBy('created_at','DESC')->get();

        foreach ($users as $user)
        {
            $to = ['email'=>$user->email,
                'name'=>$user->name];
            $data = ['status'=>$asset->status,
            ];
            Mail::later(10,' admin.mails.test01',$data, function($message) use ($to) {
                $message->to($to['email'], $to['name'])->subject('測試信件');
            });
        }

/*
        //從表單取得資料
        $from = ['email'=>$request['email'],
            'name'=>$request['name'],
            'subject'=>$request['subject']
        ];

        //填寫收信人信箱
        $to = ['email'=>$user->email,
            'name'=>$user->name];
        //信件的內容(即表單填寫的資料)
        $data = ['status'=>$asset->status,
        ];
        //寄出信件
        Mail::raw(' 資產狀態變更成'.$asset->status.' ！', function($message) use ($to) {
            //$message->from($from['email'], $from['name']);
            $message->to($to['email'], $to['name'])->subject('測試信件');
        });

        */
        return redirect()->route('admin.maintainces.show',$id);
    }





}
