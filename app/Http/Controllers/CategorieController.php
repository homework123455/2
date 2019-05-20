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
    public function index(Request $request)
    {
		$Search1 =$request->input('category_search');
		$orders = Order::orderBy('created_at','DESC')->get();
		$ordersdetails = OrdersDetail::all();
		$goods = Good::orderBy('created_at', 'DESC')->get();
        $categories = Categorie::all();
		$i=0;
        		$categories1 = Category::orderBy('created_at', 'DESC')->get();
		$data = ['categories1'=>$categories1,'Search1'=>$Search1,'i'=>$i,'goods' => $goods,'orders'=>$orders,'ordersdetails'=>$ordersdetails,'categories' => $categories];
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
     
      
        $categories = Category::find($id);

		


        
        $data = [ 'categories' => $categories];

        return view('admin.categories.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $categories = Category::find($id);
        $categories->update([
            'name' => $request->name,
            



        ]);;

        return redirect()->route('admin.categories.index');
    }

    public function store(Request $request)
    {
		$category = Category::orderBy('created_at', 'DESC')->get();
        $categorie = Category::where('name',$request->name )->get();
		$msg="";
		if(count($categorie)<=0){
        Categorie::create([
            'name' => $request->name,
            ]);
			$msg="成功新增類別:".$request->name;
			return redirect()->route('admin.categories.index');
			}
			else{
			$msg="類別:".$request->name."已存在!";
			 $data = ['msg'=>$msg,'categories' => $category];
		
          return view('admin.categories.create', $data);
			}
		
        //return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('admin.categories.index');
    }
public function Search2(Request $request)
    {
	   
		$Search1 =$request->input('category_search');
		
	if($Search1==null)
	{

	$category = Category::orderBy('created_at', 'DESC')
            ->where('id','0')
            ->get();
	}
	else
	{

	$category = Category::orderBy('created_at', 'DESC')
            ->where('id', $Search1)
            ->get();
	}        
        $categories1 = Category::orderBy('created_at', 'DESC')->get();
$i=0;
        $data=['i'=>$i,'categories1'=>$categories1,'categories'=>$category,'Search1'=>$Search1];
        return view('admin.categories.index' ,$data);
    }
	public function SearchAll1(Request $request)
    {
	
        
        $i=0;
		$Search1 =$request->input('category_search');
       $categories1 = Category::orderBy('created_at', 'DESC')->get();
        //$place=Place::orderBy('created_at', 'DESC')->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
       
		/*
        if(!(Auth::user()->previlege_id==3)){

           $place=Place::where('id','0')->get();
	   }
*/
        $data=['i'=>$i,'categories1'=>$categories1,'categories'=>$category,'Search1'=>$Search1];
        return view('admin.categories.index', $data);
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




