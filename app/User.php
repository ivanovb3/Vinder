<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match;


class User extends Model
{
   protected $table = 'users';
   public $timestamps = false;

   function checkEmail($email){
      $result = User::where('email', $email)->get();
     // if($result != null && count($result)){
      if ($result->first()) { 
      return $result[0]->email;
   }
   }

   function checkPassword($email){
      $user = User::where('email', $email)->get();
      return $user[0]->password;
   }

   function getData($email){
      return User::where('email', $email)->first();
   }

   function getNewMatch(){
      //if(Match::getMatch(session('data')['id'], )
      $usersForMatch = User::where('gender', '!=' ,session('data')['gender'])->get();
      $match = new Match();
      $idFrom = session('data')['id'];
      foreach($usersForMatch as $userForMatch){
      if(!$match->getMatch($idFrom, $userForMatch->id)){
         return $userForMatch;
      }
   }

      //return $match;
   }
}
