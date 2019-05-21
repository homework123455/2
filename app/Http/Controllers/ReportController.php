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
   public function index()
    {
		
		$reports = Report::orderBy('earn', 'DESC')->paginate(3);
		$reports1 = Report::all();
		
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
			'month'=> $startmonth
			
            ]);
		}
			
		}
		}
		}
		}
		
		$data = ['reports'=>$reports,'goods'=>$goods,'months'=>$months,'i'=>$i,'a'=>$a];
        return view('admin.reports.index', $data);
    }
	
}
