<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
      return User::where('email', $email)->get();
   }
}
