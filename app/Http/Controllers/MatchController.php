<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\User;

class MatchController extends Controller
{
    function approve(Request $req){
        $match = new Match();
        $match->user_from_id = session('data')['id'];
        $match->user_to_id = $req->idToApprove;
        $match->approved = 1;
        $match->save();
        if(Match::where('user_from_id', $req->idToApprove)->where('user_to_id', session('data')['id'])->where('approved', 1)->first()){
           $this->updateUserMatches($req->idToApprove);
           $this->updateUserMatches(session('data')['id']);
        }
        return redirect('/');
    }
    function notApprove(Request $req){
        $match = new Match();
        $match->user_from_id = session('data')['id'];
        $match->user_to_id = $req->idToNotApprove;
        $match->approved = 0;
        $match->save();
        return redirect('/');
    }
    function updateUserMatches($id){
        $user =  User::where('id', $id)->firstOrFail();
           $user->matches = $user->matches + 1;
           $user->save(); 
           session('data')['matches'] = $user->matches;
    }   


        /*function matchesCount($userId){      //on login check if the count is accurate
        $matches = Match::where('user_from_id', $userId)->where('approved', 1)->get();
        $count = 0;
        if($matches->count() > 0){
            foreach($matches as $match){
                if(Match::where('user_from_id', $match['user_to_id'])->where('user_to_id', $userId)->where('approved', 1)->first()){
                    $count++;
                }
            }
        }
        return $count;
    }  */

}
