<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*use Illuminate\Support\Facades\Validator;*/

class BlogController extends Controller
{
    public function signup(){
        return view('auth.sign-up');
    }
    public function register(Request $request){
        $request->validate([
           'firstName'=>'required',
           'lastName'=>'required',
           'email'=>'required',
           'password'=>'required'
        ]);

        /*$validator = Validator::make($request->all(), [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }*/

        User::create([
            'firstName'=> $request->firstName,
            'lastName'=> $request->lastName,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->back();




    }
}
