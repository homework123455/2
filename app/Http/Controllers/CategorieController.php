<?php

namespace App\Http\Controllers;
use App\Good;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\OrdersDetail;
use App\Categorie ;
use App\Plant;
use DB;
use App\Category;
class CategorieController extends Controller
{
    public function index()
    {
		$orders = Order::orderBy('created_at','DESC')->get();
		$ordersdetails = OrdersDetail::all();
		$goods = Good::orderBy('created_at', 'DESC')->get();
        $categories = Categorie::all();
		$i=0;	
		$data = ['i'=>$i,'goods' => $goods,'orders'=>$orders,'ordersdetails'=>$ordersdetails,'categories' => $categories];
        return view('admin.categories.index', $data);
    }

    
	  public function index1(Request $request)
    {
        
      

        $good = Good::orderBy('created_at', 'DESC')->get();

        $category = Category::orderBy('created_at', 'DESC')->get();
		
     
        /*
        if(!(Auth::user()->previlege_id==3)){

           $place=Place::where('id','0')->get();
       }
*/
        $data = ['goods' => $good, 'categories' => $category,  'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2];

        return view('admin.shops.index', $data);
    }

	public function create()
	{
		$category = Category::orderBy('created_at', 'DESC')->get();
		
		$data = ['categories' => $category ];
		
		return view('admin.categories.create', $data);
	}

    public function edit($id)
    {
     
      
        $categories = Category::orderBy('created_at', 'DESC')->get();

		


        $good = Good::find($id);
        $data = ['good' => $good, 'categories' => $categories];

        return view('admin.shops.edit', $data);
    }

    public function update(PlaceRequest $request, $id)
    {

        $good = Good::find($id);
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
        $good->update([
            'goods_name2' => $request->name,
            'category' => $request->category,
            
            'lendable' => $request->lendable,
            //'location' => $request->location,
            //'warranty'=>$request->warranty,
            'remark' => $request->remark,


          

            'photo1' => $filePath[0],
			 'pgoto2' => $filePath[1],

            



        ]);;

        return redirect()->route('admin.places.index');
    }

    public function store(Request $request)
    {
        
        Categorie::create([
            'name' => $request->name,
           

        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('admin.categories.index');
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




