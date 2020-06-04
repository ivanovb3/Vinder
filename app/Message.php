<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function getMessages($id1, $id2){
        return Message::where('user_from_id', $id1)->where('user_to_id', $id2)
        ->orWhere('user_from_id', $id2)->where('user_to_id', $id1)->orderBy('created_at', 'DESC')->get();
    }     
}
