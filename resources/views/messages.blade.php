@extends('navbar\nav')

@section('content')
@include('includes._profileBar')
<div class="messagesContent">
    <!--{{$pairMessages}}-->
    <header>
        <img src="../storage/{{$currentPair['profile_pic']}}" alt="fail">
        <span>{{$currentPair['name']}}</span>
    </header>
    <div class="messages" id="messages">
        @if($countMessages > 0)
        @foreach($pairMessages as $message)        
        @if($message['user_from_id'] == session('data')['id'])
        <div class="messageFromCurrentUser">
            <p>{{$message['message']}}</p>
            <p class="timeAgo">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</p>
        </div>
        @else
        <span>
            <img src="../storage/{{$currentPair['profile_pic']}}" alt="fail" class="avatar">
            <div class="messageToCurrentUser">
                <p>{{$message['message']}}</p>
                <p class="timeAgo">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</p>
            </div>
        </span>
        @endif
        @endforeach
        @else        
            <h1>You and {{$currentPair['name']}} have a match! Start chatting now!</h1>
        @endif
    </div>

    <footer>
        <div class="newMessages">
            <form action="addMessage" method="post">
                @csrf
                <textarea class="newMessage" name="newMessage" placeholder="Write a message.."></textarea>
                <input type="hidden" name="idTo" value="{{$currentPair['id']}}">
                <button type="submit" class="newMessageBtn">Send</button>
            </form>
        </div>
    </footer>
</div>

@include('includes._rightMatchesBar')
@stop


<style>
    .messagesContent {
        flex: 1;
    }

    .messages {
        height: 70%;
        overflow-y: scroll;
        overflow: auto;
        display: flex;
        flex-direction: column-reverse;
    }

    .newMessages {
        margin-top: 2%;
        height: 10%;
        border-color: #AAA1A3;
        border-style: groove;
        border-radius: 30px;
    }

    .newMessage {
        width: 80%;
        height: 100%;
        border-color: transparent;
        margin-left: 5%;
    }

    .newMessageBtn {
        float: right;
        height: 90%;
        margin-right: 5%;
        background-color: skyblue;
    }

    .messageFromCurrentUser {
        margin-top: 1vmin;
        width: 70%;
        /*float:right; */
        border-style: groove;
        border-color: transparent;
        background-color: lightblue;
        border-radius: 20px;
        padding: 3px;
        margin-left: 30%;
    }

    .messageToCurrentUser {
        margin-top: 1vmin;
        width: 70%;
        float: left;
        border-style: groove;
        border-color: transparent;
        background-color: lightgreen;
        border-radius: 20px;
        padding: 3px;
    }

    header img {
        min-height: 7vmin;
        max-height: 7vmin;
        min-width: 7vmin;
        max-width: 7vmin;
        border: 2px solid #FFF8FD;
        border-radius: 100px;
    }

    .avatar {
        min-height: 4vmin;
        max-height: 4vmin;
        border: 2px solid #FFF8FD;
        border-radius: 100px;
        float: left;
        flex: 0;
        width: 4%;
    }

    header {
        width: 100%;
    }

    .timeAgo {
        color: grey;
        font-size: x-small;
    }
</style>