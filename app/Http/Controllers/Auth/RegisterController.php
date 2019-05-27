<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
   protected $redirectTo = 'checkmail';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            /*'extension'=>'required|max:5',
            'position'=>'required|max:20',
            'phone'=>'required|max:20',

            'department_id'=>'required|integer',
            'previlege_id'=>'required|integer'
            */
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
     protected function create(array $data)
    {
  
            
            
  
     $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
   'address'=>$data['address'],
            /*
            'extension' => $data['extension'],
            'position' => $data['position'],
   */
            'phone' => $data['phone'],
            'gender'=> $data['gender'],
            'department_id' =>1,
            'previlege_id' =>1,

        ]);
  
  $user_mail =User::where('email',$data['email'])->first();
  $uid=$user_mail->id;
  $mail=$user_mail->email;
  $name=$user_mail->name;
  $to = ['email'=>$mail,
                'name'=>$name];
            $data1 = ['id'=>$uid];
  
                
           
            Mail::later(1,' mails.shop',$data1, function($message) use ($to) {
                $message->to($to['email'], $to['name'])->subject('註冊驗證');
            });
  return $user;
    }
	
}	
