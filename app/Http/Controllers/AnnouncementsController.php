<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'DESC')->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $data = ['announcements' => $announcements,'users'=> $users];

        return view('admin.announcements.index', $data);
    }

    public function create()
    {
        $today = Carbon::today();
        $data = ['today'=>$today];
        return view('admin.announcements.create',$data);
    }

    public function edit($id)
    {
        $announcements = Announcement::find($id);
        $data = ['announcements' => $announcements];

        return view('admin.announcements.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $announcements = Announcement::find($id);
        $announcements->update($request->all());

        return redirect()->route('admin.announcements.index');
    }

    public function store(Request  $request)
    {
        Announcement::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'content'=>$request->content1,
            'date'=>$request->date
        ]);
        return redirect()->route('admin.announcements.index');
    }

    public function destroy($id)
    {
        Announcement::destroy($id);
        return redirect()->route('admin.announcements.index');
    }
    public function show(Request $request)
    {
        $Search =$request->input('Search');
        $announcements = Announcement::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['announcements'=>$announcements];
        return view('admin.announcements.index' ,$data);
    }
}
