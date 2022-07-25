<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Signup;

class Authentication extends Controller
{
    public function signup()
    {
        return view('signup');
    }
    public function displayInfor(Signup $Request)
    {
        $user=[
            'name'=>$name = $Request->input('name'),
            'age'=>$age = $Request->input('age'),
            'date'=>$date = $Request->input('date'),
            'phone'=>$phone = $Request->input('phone'),
            'web'=>$web = $Request->input('web'),
            'address'=>$address = $Request->input('address')
        ];
        return view('signup')->with('user',$user);
    }
}
