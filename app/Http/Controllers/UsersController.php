<?php

namespace App\Http\Controllers;

use App\Department;
use App\Previlege;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersPostRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $users=User::orderBy('created_at', 'DESC')->get();
        $previleges=Previlege::orderBy('created_at','DESC')->get();
        $departments=Department::orderBy('created_at','DESC')->get();
        $data=['users'=>$users,'previleges'=>$previleges,'departments'=>$departments];
        return view('admin.users.index', $data);
    }

    public function create()
    {
        $previleges=Previlege::orderBy('created_at','DESC')->get();
        $departments=Department::orderBy('created_at','DESC')->get();
        $data=['previleges'=>$previleges,'departments'=>$departments];
        return view('admin.users.create',$data);
    }

    public function edit($id)
    {
        $user=User::find($id);
        $previleges=Previlege::orderBy('created_at','DESC')->get();
        $departments=Department::orderBy('created_at','DESC')->get();
        $data = ['user'=>$user,'previleges'=>$previleges,'departments'=>$departments];
        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        
		$user=User::find($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    public function store(UsersPostRequest $request)
    {
        /*$department_id = $request->input('department_id');
         $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'department_id'=>'required',
            'previlege_id'=>'required'
        ]);*/
        User::create($request->all());
        $request->password=bcrypt($request->password);
        $user=User::orderBy('created_at', 'DESC')->first();
        $user->update([
            'password'=>bcrypt($user->password),
			
        ]);

        return redirect()->route('admin.users.index');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }

    public function data($id)
    {
        $user=User::find($id);
        $previlege=Previlege::find($user->previlege_id);

        $data = ['user'=>$user,'previlege'=>$previlege];
        return view('admin.users.show', $data);
    }

    public function Search(Request $request)
    {
        $Search =$request->input('Search');
        $user = User::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
        $data=['user'=>user];
        return view('admin.users.index' ,$data);
    }

}
