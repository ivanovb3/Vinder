<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    function register(Request $req){
        $req->validate([
           'name' => 'required | min:4 | max:30' , 
           'email' => 'required | email', 
           'password' => 'required | min:5 | max:30', 
           'confirmPassword' => 'required | min:5 | max:30', 
           'age' => 'required',
           'gender' => 'required',  
           'img' => 'required'
        ]);
        if($req['password'] == $req['confirmPassword'])
    {        
        $user = new User;
        if(!$user->checkEmail($req->email))
        {
        $path = $req->file('img')->store('ProfilePics', ['disk' => 'public']);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->profile_pic = $path;
        $user->age = $req->age;
        $user->gender = $req->gender;
        $user->matches = 0;
        $user->bio = "";
        $user->save();
        } 
        else{
            return view('register')->withErrors(["email"=>"This email already exists!"]);
        }                                             
    }
        else{
            return view('register')->withErrors(["confirmPassword"=>"Passwords do not match!"]);
        }  
    }

    function login(Request $req){
        $req->validate([
        'email' => 'required' , 
        'password' => 'required'
        ]);
        $user = new User();
        if($user->checkEmail($req->email)){
            if($user->checkPassword($req->email) == $req->password){
                //$data = array();                
                $data = $user->getData($req->email);
                $req->session()->put('data', $data);
                return redirect('/');
            }
            else {
                return view('login')->withErrors(["failed"=>"Wrong email or password!"]);
            }
        }
        else{
            return view('login')->withErrors(["failed"=>"Wrong email or password!"]);
        } 
    }

    function show(){
        $user = new User();
        $match = $user->getNewMatch();
        $pairs = $user->getPairedPeople();
        return view('/homepage', ['match' => $match, 'pairs' => $pairs]);
    }

    function logout(){
        session()->forget('data');
        return redirect('login');
    }
}
