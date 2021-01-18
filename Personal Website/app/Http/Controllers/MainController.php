<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Controllers\Controller;;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    /*function index()
    {
     return view('login');
    }*/

    public function store(request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password1');
        $password2=$request->input('password2');
        if(empty($name) or empty($email) or empty($password) or empty($password2) or ($password != $password2) or (!filter_var($email, FILTER_VALIDATE_EMAIL))){
            if (empty($name)) {
                echo "<script type='text/javascript'>alert('Name Empty');</script>";
                echo"<br>";
            }
            if (empty($email)) {
                echo "<script type='text/javascript'>alert('Enter email');</script>";
                echo"<br>";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script type='text/javascript'>alert('Invalid Email');</script>";
                echo "<br>";
            }
            if (empty($password)) {
               echo "<script type='text/javascript'>alert('Password Required');</script>";
                echo"<br>";
            }
            if (empty($password2)) {
                echo "<script type='text/javascript'>alert('Confirm Passsword Required');</script>";
                echo"<br>";
            }
            if ($password != $password2) { 
                echo "<script type='text/javascript'>alert('Passwords do not match');</script>";
            }
            return view('signup');
        }
        else{
            $data=0;
            $data= count(DB::select('select * from users where name=? or email=?',[$name,$email]));
            if($data != 0){
                echo "<script type='text/javascript'>alert('User Already exists');</script>";
                return view('signup');
            }
            else{
                $data=DB::insert('insert into users(name,email,password) value(?,?,?)',[$name,$email,$password]);
                if( $data == 1){
                    $request->session()->put('username',$name);
                    return view('user_home')->with('data',$request->session()->get('username'));
                }
            }
            
        }   
    }

    function checklogin(Request $request)
    {
     $this->validate($request, [
      'name'   => 'required',
      'password'  => 'required|min:3'
     ]);

     $user_data = array(
      'name'  => $request->get('name'),
      'password' => $request->get('password')
     );

     /*if(Auth::attempt($user_data))
     {
      return redirect('main/successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }*/

     $data= count(DB::select('select * from users where name=? and password=?',[$user_data['name'],$user_data['password']]));
            if ($data == 1){
                $name=$request->input('name');
                $request->session()->put('name',$name);
                $activeuser=$request->session()->get('name');
                if($activeuser == 'Abhinn'){
                    return redirect('admin_home');
                }
                else{
                    return view('user_home')->with('data',$activeuser);
                }
            }
            else{
                return back()->with('error', 'Wrong Login Details');
            }

    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('main');
    }
}

?>