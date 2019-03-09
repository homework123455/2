<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Good;

class SuppilerController extends Controller
{
   public function index()
    {
		$supplier = Supplier::orderBy('created_at', 'DESC')->get();

		$good = Good::all();
		$i=0;
		
		
		$data = ['suppliers'=>$supplier,'goods'=>$good,'i'=>$i];
        return view('admin.suppliers.index', $data);
    }
	public function create()
	{
		$supplier = Supplier::orderBy('created_at', 'DESC')->get();
		
		$data = ['suppliers' => $supplier ];
		
		return view('admin.suppliers.create', $data);
	}
	public function store(Request $request)
    {
		$supplier = Supplier::orderBy('created_at', 'DESC')->get();
        $Suppliers = Supplier::where('name',$request->name )->get();
		$msg="";
		if(count($Suppliers)<=0){
        Supplier::create([
            'name' => $request->name,
			'phone'=> $request->phone,
			'adderss'=>$request->adderss
            ]);
			$msg="成功新增供應商:".$request->name;
			return redirect()->route('admin.suppliers.index');
			}
			else{
			$msg="供應商:".$request->name."已存在!";
			 $data = ['msg'=>$msg,'suppliers' => $category];
		
          return view('admin.suppliers.create', $data);
			}
		
        //return redirect()->route('admin.categories.index');
    }
	 public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('admin.suppliers.index');
    }
}
