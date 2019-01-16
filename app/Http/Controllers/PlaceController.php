<?php

namespace App\Http\Controllers;


use App\Place;
use App\Week;
use App\Time_;
use App\Category;
use App\Http\Requests\PlaceRequest;
use App\Lending;
use App\Maintaince;
use App\MaintainceItem;
use App\User;

//use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{

    //
    public function index(Request $request)
    {
        
        $Search = $request->input('week_search');
        $Search2 = $request->input('time_search');
        $Search1 = $request->input('category_search');

        $place = Place::orderBy('created_at', 'DESC')->get();

        $category = Category::orderBy('created_at', 'DESC')->get();
        $lendings = Lending::whereNULL('returntime')->get();
        $weeks = Week::orderBy('id', 'ASC')->get();
        $times = Time_::orderBy('id', 'ASC')->get();
		$maintaincesALL = Maintaince::orderBy('created_at', 'DESC');
        $maintainces = $maintaincesALL->whereIn('status', array('申請中'))->get();
        /*
        if(!(Auth::user()->previlege_id==3)){

           $place=Place::where('id','0')->get();
       }
*/
        $data = ['places' => $place, 'lendings' => $lendings, 'categories' => $category, 'times' => $times, 'weeks' => $weeks, 'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2, 'maintainces' => $maintainces];

        return view('admin.places.index', $data);
    }

    public function create()
    {
        $category = Category::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $weeks = Week::orderBy('id', 'ASC')->get();
        $times = Time_::orderBy('id', 'ASC')->get();
        // $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
        $data = ['categories' => $category, 'users' => $users, 'times' => $times, 'weeks' => $weeks];
        return view('admin.places.create', $data);
    }

    public function edit($id)
    {
        //$array = ["正常使用中","維修中","租借中","待報廢","已報廢"];
        $weeks = Week::orderBy('id', 'ASC')->get();
        $times = Time_::orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        // $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
		


        $place = Place::find($id);
        $data = ['place' => $place, 'categories' => $categories, 'users' => $users, 'times' => $times, 'weeks' => $weeks];

        return view('admin.places.edit', $data);
    }

    public function update(PlaceRequest $request, $id)
    {

        $place = Place::find($id);
		 $file = $request->file('img');
        $filePath = [];  // 定义空数组用来存放图片路径
        foreach ($file as $key => $value) {
            // 判断图片上传中是否出错

/*
                if (!$value->isValid()) {
                    exit('上傳圖片出錯，請重試！');
					//echo '<script>alert('.上傳圖片出錯，請重試！.');</script>';
                }
*/
            //if(!empty($value)){//此处防止没有多文件上传的情况
               // $allowed_extensions = ["png", "jpg", "gif","JPG"];

            /*
                            if (!$value->isValid()) {
                               // exit"<script> alert('上傳圖片出錯，請重試！')</script>";
                                echo '<script>alert('.上傳圖片出錯，請重試！.');</script>';
                            }
            */
            if (!empty($value)) {//此处防止没有多文件上传的情况
                $allowed_extensions = ["png", "jpg", "gif","JPG"];

                if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
                    exit('您只能上傳PNG、JPG或GIF格式的圖片！');
                }
                $destinationPath = '/uploads/' . date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension; // 重命名
                $value->move(public_path() . $destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath . '/' . $fileName;

            }
        }
        $place->update([
            'name' => $request->name,
            'category' => $request->category,
            //'date'=>$request->date,

            
            'keeper' => $request->keeper,
            'week_id' => $request->week_id,
            'time_id' => $request->time_id,
            'lendable' => $request->lendable,
            'location' => $request->location,
            //'warranty'=>$request->warranty,
            'remark' => $request->remark,


          

            'file' => $filePath[0],

            



        ]);;

        return redirect()->route('admin.places.index');
    }

    public function store(PlaceRequest $request)
    {
        $file = $request->file('img');
        $filePath = [];  // 定义空数组用来存放图片路径
        foreach ($file as $key => $value) {
            // 判断图片上传中是否出错

/*
                if (!$value->isValid()) {
                    exit('上傳圖片出錯，請重試！');
					//echo '<script>alert('.上傳圖片出錯，請重試！.');</script>';
                }
*/
            //if(!empty($value)){//此处防止没有多文件上传的情况
               // $allowed_extensions = ["png", "jpg", "gif","JPG"];

            /*
                            if (!$value->isValid()) {
                               // exit"<script> alert('上傳圖片出錯，請重試！')</script>";
                                echo '<script>alert('.上傳圖片出錯，請重試！.');</script>';
                            }
            */
            if (!empty($value)) {//此处防止没有多文件上传的情况
                $allowed_extensions = ["png", "jpg", "gif","JPG"];

                if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
                    exit('您只能上傳PNG、JPG或GIF格式的圖片！');
                }
                $destinationPath = '/uploads/' . date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension; // 重命名
                $value->move(public_path() . $destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath . '/' . $fileName;

            }
        }
        /*Place::create([
        $request->all()]);*/
        Place::create([
            'name' => $request->name,
            'category' => $request->category,
            //'date'=>$request->date,

            'status' => $request->status,
            'keeper' => $request->keeper,
            'week_id' => $request->week_id,
            'time_id' => $request->time_id,
            'lendable' => $request->lendable,
            'location' => $request->location,
            //'warranty'=>$request->warranty,
            'remark' => $request->remark,


          

            'file' => $filePath[0],

            



        ]);

        return redirect()->route('admin.places.index');
    }

    public function destroy($id)
    {
        Place::destroy($id);
        return redirect()->route('admin.places.index');
    }

    public function data($id)
    {

        $place = Place::find($id);
        $category = Category::find($place->category);
        //$vendor=Vendor::find($place->vendor);
        $user = User::find($place->keeper);
		
        $maintainceitems = MaintainceItem::orderBy('created_at', 'ASC')->get();
        $assetmaintainces = Maintaince::where('place_id', $place->id)->where('status', '通過')->get();
        $lendings = Lending::where('returntime', null)->get();
        $times = Time_::orderBy('id', 'ASC')->get();
        $weeks = Week::orderBy('id', 'ASC')->get();
        $data = ['place' => $place, 'category' => $category, 'user' => $user,
            'assetmaintainces' => $assetmaintainces, 'maintainceitems' => $maintainceitems,
            'lendings' => $lendings, 'times' => $times, 'weeks' => $weeks];

        return view('admin.places.show', $data);
    }

    public function Search(Request $request)
    {

        $times = Time_::orderBy('id', 'ASC')->get();
        $Search = $request->input('week_search');
        $Search2 = $request->input('time_search');
        $Search1 = $request->input('category_search');
        $weeks = Week::orderBy('id', 'ASC')->get();
        if (Auth::user()->previlege_id != 3 && $Search == null) {

            $place = Place::orderBy('created_at', 'DESC')
                ->where('id', '0')
                ->get();
        } else {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('week_id', $Search)
                ->get();
        }
        $category = Category::orderBy('created_at', 'DESC')->get();
        $lendings = Lending::whereNull('returntime')->get();

        $data = ['places' => $place, 'lendings' => $lendings, 'categories' => $category, 'weeks' => $weeks, 'times' => $times, 'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2];
        return view('admin.places.index', $data);
    }

    public function Search1(Request $request)
    {

        $times = Time_::orderBy('id', 'ASC')->get();
        $Search = $request->input('week_search');
        $Search2 = $request->input('time_search');
        $Search1 = $request->input('category_search');
        $weeks = Week::orderBy('id', 'ASC')->get();
        if (Auth::user()->previlege_id != 3 && $Search1 == null) {

            $place = Place::orderBy('created_at', 'DESC')
                ->where('id', '0')
                ->get();
        } else {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('category', $Search1)
                ->get();
        }
        $category = Category::orderBy('created_at', 'DESC')->get();
        $lendings = Lending::whereNull('returntime')->get();

        $data = ['places' => $place, 'lendings' => $lendings, 'categories' => $category, 'weeks' => $weeks, 'times' => $times, 'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2];
        return view('admin.places.index', $data);
    }

    public function Search10(Request $request)
    {
        $maintaincesALL = Maintaince::orderBy('created_at', 'DESC');
        $maintainces = $maintaincesALL->whereIn('status', array('申請中'))->get();
        $times = Time_::orderBy('id', 'ASC')->get();
        $Search = $request->input('week_search');
        $Search2 = $request->input('time_search');
        $Search1 = $request->input('category_search');
        $weeks = Week::orderBy('id', 'ASC')->get();
        if( $Search == "" && $Search1 ==""&& $Search2 =="") {

            $place = Place::orderBy('created_at', 'DESC')
                ->where('id', '0')
                ->get();
        }
        else if ( $Search2 =="" && $Search1 =="") {

            $place = Place::orderBy('created_at', 'DESC')
                ->where('week_id', $Search)
                ->get();
        } else if ( $Search == "" &&$Search1 == "") {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('time_id', $Search2)
                ->get();
        } else if ( $Search =="" && $Search2 =="") {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('category', $Search1)
                ->get();
        } else if ( $Search == "") {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('time_id', $Search2)->where('category', $Search1)
                ->get();
        } else if ($Search1 == "") {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('time_id', $Search2)->where('week_id', $Search)
                ->get();
        } else if ( $Search2 == "") {
            $place = Place::orderBy('created_at', 'DESC')
                ->where('category', $Search1)->where('week_id', $Search)
                ->get();
        } else
    {

            $place = Place::orderBy('created_at', 'DESC')
            ->where('category', $Search1)->where('week_id', $Search)->where('time_id', $Search2)
            ->get();
        }

        $category = Category::orderBy('created_at', 'DESC')->get();
        $lendings = Lending::whereNull('returntime')->get();

        $data = ['places' => $place, 'lendings' => $lendings, 'categories' => $category, 'weeks' => $weeks, 'times' => $times, 'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2,'maintainces'=>$maintainces];
        return view('admin.places.index', $data);
        }


		public function Search2(Request $request)
    {
	    
		$times=Time_::orderBy('id','ASC')->get();
        $Search =$request->input('week_search');
        $Search2 =$request->input('time_search');
		$Search1 =$request->input('category_search');
		$weeks=Week::orderBy('id','ASC')->get();
	if(Auth::user()->previlege_id!=3&&$Search2==null)
	{

	$place = Place::orderBy('created_at', 'DESC')
            ->where('id','0')
            ->get();
	}
	else
	{

	$place = Place::orderBy('created_at', 'DESC')
            ->where('time_id',$Search2)
            ->get();
	}        
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNull('returntime')->get();

        $data=['places'=>$place,'lendings'=>$lendings,'categories'=>$category,'weeks'=>$weeks,'times'=>$times,'Search'=>$Search,'Search1'=>$Search1,'Search2'=>$Search2];
        return view('admin.places.index' ,$data);
    }

    public function SearchAll(Request $request)
    {

        $place = Place::orderBy('created_at', 'DESC');
        //$Search =$request->input('week_search');
        $Search =$request->input('Search');
		//$Search1 =$request->input('category_search');
        $place ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['places'=>$place,'categories'=>$category];
        return view('admin.places.index' ,$data);
    }
	public function SearchAll1(Request $request)
    {
	$maintaincesALL = Maintaince::orderBy('created_at', 'DESC');
        $maintainces = $maintaincesALL->whereIn('status', array('申請中'))->get();
        $Search =$request->input('week_search');
        $Search2 =$request->input('time_search');
		$Search1 =$request->input('category_search');

        $place=Place::orderBy('created_at', 'DESC')->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNULL('returntime')->get();
		$weeks=Week::orderBy('id','ASC')->get();
		$times=Time_::orderBy('id','ASC')->get();
		/*
        if(!(Auth::user()->previlege_id==3)){

           $place=Place::where('id','0')->get();
	   }
*/
        $data=['places'=>$place,'lendings'=>$lendings,'categories'=>$category,'times'=>$times,'weeks'=>$weeks,'Search'=>$Search,'Search1'=>$Search1,'Search2'=>$Search2,'maintainces'=>$maintainces];
        return view('admin.places.index', $data);
    }
    public function scrapped($id)
    {

        $place=Place::find($id);
        $place->update([
            'status'=>'維修中',
			'lendable'=>'0'
        ]);
		
        return redirect()->route('admin.places.index');
    }
	public function scrapped1($id)
    {

        $place=Place::find($id);
        $place->update([
            'status'=>'正常使用中',
			'lendable'=>'1'
        ]);
        return redirect()->route('admin.places.index');
    }

    public function lendings_create($id)
    {

        $place=Place::find($id);
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $today = Carbon::today();
        $data=['place'=>$place,'users'=>$users,'today'=>$today];
        return view('admin.places.lending' ,$data);
    }

    public function lendings_store(Request $request,$id)
    {

        $place=Place::find($id);
		$users=User::orderBy('created_at' ,'DESC') ->get();
        $place->lendings()->create([
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
		
		
		

        $place->update([
            'status'=>'租借中',
			'lendable'=>'0',
			'lendname'=>$lendname_name,
        ]);
        return redirect()->route('admin.places.index');
    }

    public function lendings_return($aid,$id)
    {

        $place=Place::find($aid);
        $lending=Lending::find($id);
		/*
        $lending->update([
            'returntime'=>Carbon::now()
        ]);
		*/
		Lending::destroy($id);
        $place->update([
            'status'=>'正常使用中',
			'lendable'=>'1',
			'lendname'=>NULL
        ]);
        return redirect()->route('admin.places.index');
    }
    public function instascan()
{
    return view('admin.places.instascan');
}
}
