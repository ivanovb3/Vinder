<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    public $timestamps = false;

    function getMatch($idFrom, $idTo){                            //for checking if someone already 'voted' for someone else 
        return Match::where('user_from_id', $idFrom)->where('user_to_id', $idTo)->first();
    }
}
