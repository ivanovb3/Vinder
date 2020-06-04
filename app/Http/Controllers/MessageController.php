<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Message;
use App\User;
use Symfony\Component\HttpFoundation\Session\Session;

class MessageController extends Controller
{
    /*function getMessages($id2){
       $message = new Message();
        $user = new User();
        $pairs = $user->getPairedPeople();
        $id1 = session('data')['id'];
        $messages = $message->getMessages($id1, $id2); 

        //return view('messages', ['pairMessages' => $messages, 'pairs' =>$pairs]);
        //return redirect('messages')->with( ['pairMessages' => $messages, 'pairs' => $pairs]); 
        //return redirect()->route( 'messages.show' )->with( [ 'id' => $id ] );
    } */
    function show($id2){
        $message = new Message();
        $user = new User();
        $pairs = $user->getPairedPeople();
        $id1 = session('data')['id'];
        $messages = $message->getMessages($id1, $id2);
        $count = $messages->count();
        $currentPair = User::where('id', $id2)->first();

        return view('messages', ['pairMessages' => $messages, 'pairs' =>$pairs, 'currentPair'=>$currentPair, 'countMessages'=>$count]); 
        // return redirect('messages')->with( ['pairMessages' => $messages, 'pairs' => $pairs]); 
        
        /*$messages = Session::get('messages');
        $pairs = Session::get('pairs');
        return view('messages', ['pairMessages' => $messages, 'pairs' =>$pairs]); */
        
    }

    public function addMessage(Request $req){
        $message = new Message();
        $message->user_from_id = session('data')['id'];
        $message->user_to_id = $req->idTo;
        $message->message = $req->newMessage;
        $message->save();
        return redirect('messages/'.$req->idTo);
    }
}
