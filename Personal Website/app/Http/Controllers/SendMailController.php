<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    function index()
    {
     return view('/');
    }

    function send(Request $request)
    {
    	$name=$request->input('name');
        $message=$request->input('message');
        if (empty($name)) {
                echo "<script type='text/javascript'>alert('Name Empty');</script>";
                echo"<br>";
            }
            if (empty($message)) {
                echo "<script type='text/javascript'>alert('Enter email');</script>";
                echo"<br>";
            }
     $this->validate($request, [
      'name'     =>  'required',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

     Mail::to('abhinntrivedi@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }
}

?>