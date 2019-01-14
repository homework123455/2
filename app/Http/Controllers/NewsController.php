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
        New_::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'content'=>$request->content1,
            'date'=>$request->date
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
