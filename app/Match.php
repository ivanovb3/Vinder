<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    public $timestamps = false;

    function checkMatch($idFrom, $idTo){                            //for checking if someone already 'voted' for someone else 
        return Match::where('user_from_id', $idFrom)->where('user_to_id', $idTo)->first();
    }

    function checkPairedPeople($id1, $id2){                  //for checking if two people approved each other
       $match = Match::where('user_from_id', $id1)->where('user_to_id', $id2)->where('approved', 1)->first();       
       if($match){
           $matchPair = Match::where('user_from_id', $id2)->where('user_to_id', $id1)->where('approved', 1)->first();
           if($matchPair){
               return $matchPair;
           }
       }
    }
}
