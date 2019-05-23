<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Good;
use App\Suppliersdetail;
use App\Report;
use App\Monthly;
use Carbon\Carbon;
class ReportController extends Controller
{
   public function index($id)
    {
		
		$reports = Report::find($id);
		$months=Monthly::orderBy('month','asc')->get();
		$goods = Good::all();
		$i=0;
		$a="";
		
		
		$data = ['reports'=>$reports,'goods'=>$goods,'i'=>$i,'a'=>$a,'months'=>$months];
        return view('admin.reports.index1', $data);
    }
	
	public function index1()
    {
		
		$reports = Report::orderBy('id', 'ASC')->paginate(5);
		
		
		$goods = Good::all();
		$i=0;
		$a="";
		$months=Monthly::orderBy('month','asc')->get();
		$end = new Carbon('last day of last month');
		$start=Carbon::parse($end)->addDays(1)->format('Ymd');
		$startmonth=Carbon::parse($end)->addmonth()->format('m');
	$link=mysqli_connect("localhost:33060","root","root","homestead");
	$sql ="SELECT * FROM monthly WHERE month='$startmonth'";
	$rec = $link->query($sql);	
	$rNum = $rec->num_rows;
	$rs = $rec->fetch_array();
	
	//echo "$S1"; 
	if(isset($S1)){

			$i=1;

	}
		if(Carbon::Now()->format('Ymd')==($start)){
		foreach($goods as $good){	
		
		foreach($reports1 as $report1){
		if($report1->good_id==$good->id){
		
		if($rNum<1){
		Monthly::create([
            'good_id' => $report1->good_id,
			'earn'=> $report1->earn,
			'month'=> $startmonth,
			'trade'=>$$report1->trade,
			
            ]);
		}
			
		}
		}
		}
		}
		
		
		$data = ['reports'=>$reports,'goods'=>$goods,'i'=>$i,'a'=>$a];
        return view('admin.reports.all', $data);
    }
	public function sort1($id)
    {
		if($id=='id'){
			$reports = Report::orderBy($id, 'ASC')->paginate(5);
		}
		else{
		$reports = Report::orderBy($id, 'DESC')->paginate(5);
		}
		
		$goods = Good::all();
		$i=0;
		$a="";
		
		
		$data = ['reports'=>$reports,'goods'=>$goods,'i'=>$i,'a'=>$a];
        return view('admin.reports.all', $data);
    }
	
}
