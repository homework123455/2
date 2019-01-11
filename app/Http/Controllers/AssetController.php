<?php

namespace App\Http\Controllers;


use App\Asset;
use App\Category;
use App\Http\Requests\AssetRequest;
use App\Lending;
use App\Maintaince;
use App\MaintainceItem;
use App\User;

//use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
   
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNULL('returntime')->get();
		/*
        if(!(Auth::user()->previlege_id==3)){
           $asset=Asset::where('id','0')->get();
	   }
*/
        $data=['assets'=>$asset,'lendings'=>$lendings,'categories'=>$category];
        return view('admin.assets.index', $data);
    }
    public function create()
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
       // $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
        $data=['categories'=>$category,'users'=>$users];
        return view('admin.assets.create' ,$data);
    }

    public function edit($id)
    {
        //$array = ["正常使用中","維修中","租借中","待報廢","已報廢"];
        $categories=Category::orderBy('created_at' ,'DESC') ->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
       // $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
        $asset=Asset::find($id);
        $data = ['asset' => $asset,'categories'=>$categories,'users'=>$users];

        return view('admin.assets.edit', $data);
    }
    public function update(AssetRequest $request, $id)
    {
        $asset=Asset::find($id);
        $asset->update($request->all());

        return redirect()->route('admin.assets.index');
    }
    public function store(AssetRequest $request)
    {
        $file = $request->file('img');
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach ($file as $key => $value) {
            // 判断图片上传中是否出错

                if (!$value->isValid()) {
                    exit("上傳圖片出錯，請重試！");
                }

            if(!empty($value)){//此处防止没有多文件上传的情况
                $allowed_extensions = ["png", "jpg", "gif"];
                if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
                    exit('您只能上傳PNG、JPG或GIF格式的圖片！');
                }
                $destinationPath = '/uploads/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath.'/'.$fileName;

            }
        }
        /*Asset::create([
        $request->all()]);*/
        Asset::create([
            'name'=>$request->name,
            'category'=>$request->category,
            'date'=>$request->date,

            'status'=>$request->status,
            'keeper'=>$request->keeper,

            'lendable'=>$request->lendable,
            'location'=>$request->location,
            'warranty'=>$request->warranty,
            'remark'=>$request->remark,

            'file'=>$filePath[0],
            'file1'=>$filePath[1]


        ]);

        return redirect()->route('admin.assets.index');
    }
    public function destroy($id)
    {
        Asset::destroy($id);
        return redirect()->route('admin.assets.index');
    }

    public function data($id)
    {
        $asset=Asset::find($id);
        $category=Category::find($asset->category);
        //$vendor=Vendor::find($asset->vendor);
        $user=User::find($asset->keeper);
        $maintainceitems=MaintainceItem::orderBy('created_at', 'ASC')->get();
        $assetmaintainces=Maintaince::where('asset_id',$asset->id)->where('status','通過')->get();
        $lendings=Lending::where('returntime',null)->get();

        $data = ['asset' => $asset,'category'=>$category,'user'=>$user,
                 'assetmaintainces'=>$assetmaintainces,'maintainceitems'=>$maintainceitems,
                'lendings'=>$lendings];

        return view('admin.assets.show', $data);
    }

    public function Search(Request $request)
    {
	
        $Search =$request->input('Search');
	if(Auth::user()->previlege_id!=3&&$Search==null)
	{
	$asset = Asset::orderBy('created_at', 'DESC')
            ->where('id','0')
            ->get();
	}
	else
	{
	$asset = Asset::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
	}        
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNull('returntime')->get();
        $data=['assets'=>$asset,'lendings'=>$lendings,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }

    public function SearchAll(Request $request)
    {
        $asset = Asset::orderBy('created_at', 'DESC');

        $Search =$request->input('Search');
        $asset ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['assets'=>$asset,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }
    public function scrapped($id)
    {
        $asset=Asset::find($id);
        $asset->update([
            'status'=>'維修中',
			'lendable'=>'0'
        ]);
		
        return redirect()->route('admin.assets.index');
    }
	public function scrapped1($id)
    {
        $asset=Asset::find($id);
        $asset->update([
            'status'=>'正常使用中',
			'lendable'=>'1'
        ]);
        return redirect()->route('admin.assets.index');
    }

    public function lendings_create($id)
    {
        $asset=Asset::find($id);
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $today = Carbon::today();
        $data=['asset'=>$asset,'users'=>$users,'today'=>$today];
        return view('admin.assets.lending' ,$data);
    }

    public function lendings_store(Request $request,$id)
    {
        $asset=Asset::find($id);
		$users=User::orderBy('created_at' ,'DESC') ->get();
        $asset->lendings()->create([
            'user_id'=>$request->user_id,
            'lenttime'=> Carbon::now(),
			
        ]);
		//$lendname_id=$request->user_id;
		foreach($users as $user){
        if($request->user_id==$user->id){
			$lendname_name=$user->name;
		//$user1=User::find($application->user_id);
		//$user2=$user->name;
		}
		}
		
		
		
        $asset->update([
            'status'=>'租借中',
			'lendable'=>'0',
			'lendname'=>$lendname_name,
        ]);
        return redirect()->route('admin.assets.index');
    }

    public function lendings_return($aid,$id)
    {
        $asset=Asset::find($aid);
        $lending=Lending::find($id);
        $lending->update([
            'returntime'=>Carbon::now()
        ]);
        $asset->update([
            'status'=>'正常使用中',
			'lendable'=>'1',
			'lendname'=>NULL
        ]);
        return redirect()->route('admin.assets.index');
    }
    public function instascan()
{
    return view('admin.assets.instascan');
}
}
