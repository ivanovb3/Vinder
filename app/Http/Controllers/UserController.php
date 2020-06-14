<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $req->validate([
            'name' => 'required | min:4 | max:30',
            'email' => 'required | email',
            'password' => 'required | min:5 | max:30',
            'confirmPassword' => 'required | min:5 | max:30',
            'age' => 'required',
            'gender' => 'required',
            'img' => 'required'
        ]);
        if ($req['password'] == $req['confirmPassword']) {
            $user = new User;
            if (!$user->checkEmail($req->email)) {
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
                $data = $user->getData($req->email);
                $req->session()->put('data', $data);
                return redirect('/');
            } else {
                return view('register')->withErrors(["email" => "This email already exists!"]);
            }
        } else {
            return view('register')->withErrors(["confirmPassword" => "Passwords do not match!"]);
        }
    }

    function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        $match = new MatchController();
        if ($user->checkEmail($req->email)) {
            if ($user->checkPassword($req->email) == $req->password) {
                $data = $user->getData($req->email);
                $req->session()->put('data', $data);
                return redirect('/');
            } else {
                return view('login')->withErrors(["failed" => "Wrong email or password!"]);
            }
        } else {
            return view('login')->withErrors(["failed" => "Wrong email or password!"]);
        }
    }

    function show()
    {
        $user = new User();
        $match = $user->getNewMatch();
        $pairs = $user->getPairedPeople();
        return view('/homepage', ['match' => $match, 'pairs' => $pairs]);
    }

    function showProfilePage()
    {
        $user = new User();
        $match = $user->getNewMatch();
        $pairs = $user->getPairedPeople();
        return view('/profile', ['match' => $match, 'pairs' => $pairs]);
    }

    function logout()
    {
        session()->forget('data');
        return redirect('login');
    }

    function updateName(Request $req)
    {
        if($req->newName != ""){
        $user =  User::where('id', session('data')['id'])->firstOrFail();
        $user->name = $req->newName;
        $user->save();
        session('data')['name'] = $user->name;
        $req->session()->flash('newChange', 'Your Name has been updated');
        return redirect('/profile');}
        else {
            $req->session()->flash('newChange', 'Name can not be empty!');
        return redirect('/profile');
        }
    }
    function updateBio(Request $req)
    {
        $user =  User::where('id', session('data')['id'])->firstOrFail();
        $user->bio = $req->newBio;
        $user->save();
        session('data')['bio'] = $user->bio;
        $req->session()->flash('newChange', 'Your bio has been updated!');
        return redirect('/profile');
    }

    function updatePassword(Request $req)
    {
        //if(strlen($req->confirmNewPassword) < 5 && strlen($req->newPassword) < 5 && strlen($req->oldPassword) < 5)
        if($req->confirmNewPassword != "" && $req->newPassword != "" && $req->oldPassword != "")
        {
        $user =  User::where('id', session('data')['id'])->firstOrFail();
        if ($req->oldPassword == session('data')['password']) {
            if ($req->newPassword == $req->confirmNewPassword) {
                if($req->newPassword != session('data')['password']){
                $user->password = $req->newPassword;
                $user->save();
                session('data')['password'] = $user->password;
                $req->session()->flash('newChange', 'Your password has been updated!');
                return redirect('/profile');}
                else{
                    $req->session()->flash('newChange', 'Your new password is same as the old password!');
                    return redirect('/profile');
                }
            } else {
                $req->session()->flash('newChange', 'Passwords do not match!');
                return redirect('/profile');
            }
        } else {
            $req->session()->flash('newChange', 'Your old password do not match!');
            return redirect('/profile');
        }
    }
    else{
        $req->session()->flash('newChange', 'Atleast one field is less than 5 characters!');
            return redirect('/profile');
    }

    }

    function updatePicture(Request $req){
        $req->validate([
            'newPicture' => 'required'
        ]);
        $user =  User::where('id', session('data')['id'])->firstOrFail();
        $path = $req->file('newPicture')->store('ProfilePics', ['disk' => 'public']);
        $user->profile_pic = $path;
        $user->save();
        session('data')['profile_pic'] = $user->profile_pic;
        return redirect('/profile'); 
    }
}



                /*$matchesCount = $match->matchesCount($data['id']);    //get current count of matches
                if ($matchesCount != $data['matches']) {        //if there is a change between actual count and count in db -> update db
                    DB::table('users')
                        ->where('id', $data['id'])
                        ->update(['matches' => $matchesCount]);
                    $data['matches'] = $matchesCount;       //save new count of matches
                } */