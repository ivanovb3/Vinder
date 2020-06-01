<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;

class MatchController extends Controller
{
    function approve(Request $req){
        $match = new Match();
        $match->user_from_id = session('data')['id'];
        $match->user_to_id = $req->idToApprove;
        $match->approved = 1;
        $match->save();
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

}
