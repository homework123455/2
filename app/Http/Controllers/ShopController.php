<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\PlaceRequest;
use App\Good;
use App\Plant;
use DB;
use App\Category;
class ShopController extends Controller
{
    public function index()
    {
        $data = Good::all();
		$category = Category::all();
        return view('Shop', ['goods' => $data,'categories'=>$category]);
    }


    //淨化力
    public function cleanup($id)
    {
		$category = Category::all();		
        $data = Good::where('category','=',$id)->get();
        return view('Shop', ['goods' => $data,'categories'=>$category]);
        
    }
    public function cleandown()
    {

        $data = DB::table('goods')
        ->join('plants', 'goods.id', '=', 'plants.goods_id')
        ->where('cleanup_co2','<',6)
        ->get();
        return view('Shop', ['goods' => $data]);
    }

    //滯塵能力
    public function dustup()
    {
        $data = DB::table('goods')
        ->join('plants', 'goods.id', '=', 'plants.goods_id')
        ->where('dust','>',5)
        ->get();
        return view('Shop', ['goods' => $data]);
    }
    public function dustdown()
    {
        $data = DB::table('goods')
        ->join('plants', 'goods.id', '=', 'plants.goods_id')
        ->where('dust','<',6)
        ->get();
        return view('Shop', ['goods' => $data]);
    }
     
     
    //價格排序
    public function price($tpye)
    {
		$category = Category::all();
        $data = Good::orderBy('price', $tpye)->get();
        return view('Shop', ['goods' => $data,'categories'=>$category]);
    }


    //搜尋
    public function search(Request $request)
    {

        $search = $request->input("search");

        $data =DB::table('goods')
            ->join('plants', 'goods.id', '=', 'plants.goods_id')
            ->where('goods_name2','like','%'.$search.'%')
            ->get();
        return view('Shop', ['goods' => $data]);
    }
	  public function index1(Request $request)
    {
        //if(!Auth:user()->previlege_id==3)){
		$order=Order::where('users_id',Auth::user()->id)->get();

        //$good = Good::orderBy('created_at', 'DESC')->get();
		$ordersdetail= OrdersDetail::where('orders_id',$order)->get();

        //$category = Category::orderBy('created_at', 'DESC')->get();
		//}
		//else{
			$order =Order::all();
			$ordersdetail=OrdersDetail::find($order);
			
		//}
        /*
        if(!(Auth::user()->previlege_id==3)){

           $place=Place::where('id','0')->get();
       }
*/
        $data = ['orders' => $order,'ordersdetails'=>$ordersdetail, 'categories' => $category,  'Search' => $Search, 'Search1' => $Search1, 'Search2' => $Search2];

        return view('admin.shops.index', $data);
    }

	public function create()
	{
		$category = Category::orderBy('created_at', 'DESC')->get();
		$good=Good::orderBy('created_at','DESC')->get();
		$data = ['categories' => $category ,'goods'=>$good];
		
		return view('admin.shops.create', $data);
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
        Good::create([
            'name' => $request->name,
            'category' => $request->category,
            //'date'=>$request->date,

            'status' => $request->status,
            
            'lendable' => $request->lendable,
            'price' => $request->price,
            //'warranty'=>$request->warranty,
            'remark' => $request->remark,
			'details'=>$request->details,
			'details2'=>$request->details2,
			'details3'=>$request->details3,


          

            'photo1' => $filePath[0],
			'photo2' => $filePath[1],
			'photo3' => $filePath[2],
			'photo4' => $filePath[3],

            



        ]);

        return redirect()->route('admin.places.index');
    }

    public function destroy($id)
    {
        Good::destroy($id);
        return redirect()->route('admin.places.index');
    }

    public function data($id)
    {

        $order = Order::find($id);
		$ordersdetail=OrdersDetail::where('orders_id',$order->id);
        /*$category = Category::find($place->category);
        //$vendor=Vendor::find($place->vendor);
        $user = User::find($place->keeper);
		
        $maintainceitems = MaintainceItem::orderBy('created_at', 'ASC')->get();
        $assetmaintainces = Maintaince::where('place_id', $place->id)->where('status', '通過')->get();
        $lendings = Lending::where('returntime', null)->get();
        $times = Time_::orderBy('id', 'ASC')->get();
        $weeks = Week::orderBy('id', 'ASC')->get();
		place' => $place, 'category' => $category, 'user' => $user,
            'assetmaintainces' => $assetmaintainces, 'maintainceitems' => $maintainceitems,
            'lendings' => $lendings, 'times' => $times, 'weeks' => $weeks*/
        $data = ['orders'=>$order,'ordersdetails'=>$ordersdetail];

        return view('admin.shops.show', $data);
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




