<?php

namespace App\Http\Controllers;

use App\New_;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
		
        $news = New_::orderBy('created_at', 'DESC')->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $data = ['news' => $news,'users'=> $users];

        return view('admin.news.index', $data);
    }

    public function create()
    {
        $today = Carbon::today();
        $data = ['today'=>$today];
        return view('admin.news.create',$data);
    }

    public function edit($id)
    {
        $news = New_::find($id);
        $data = ['news' => $news];

        return view('admin.news.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $news = New_::find($id);
        $news->update($request->all());

        return redirect()->route('admin.news.index');
    }

    public function store(Request  $request)
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
        New_::create([
            'user_id'=>Auth::user()->id,
			
            'title'=>$request->title,
            'content1'=>$request->content1,
			'content2'=>$request->content2,
			'content3'=>$request->content3,
			'content4'=>$request->content4,
			'photo'=>$filePath[0]
            
        ]);
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        New_::destroy($id);
        return redirect()->route('admin.news.index');
    }
    public function show(Request $request)
    {
        $Search =$request->input('Search');
        $news = New_::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['news'=>$news];
        return view('admin.news.index' ,$data);
    }
}
