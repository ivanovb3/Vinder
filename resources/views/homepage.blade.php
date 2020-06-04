@extends('navbar.nav')

@section('content')
@include('includes._profileBar')
<div class="newMatches">
    <h1>Your new matches:</h1>
    <br>
    @if($match)
    <div class="newMatch">
        <img src="storage/{{$match['profile_pic']}}" alt="fail">
        <p class="info">{{$match['name']}}, {{$match['age']}}</p>
        <p class="info">{{$match['bio']}}</p>
        <div class="buttons">
        <form action="approve" method="post">
            @csrf
            <input type="hidden" name="idToApprove" value="{{$match['id']}}">
            <button type="submit" class="like"></button>
        </form>
        <form action="notApprove" method="post">
            @csrf
            <input type="hidden" name="idToNotApprove" value="{{$match['id']}}">
            <button type="submit" class="dislike"></button>
        </form>
        </div>
    </div>
    @else
    <h2>Currently no new matches</h2>
    @endif
</div>

@include('includes._rightMatchesBar')
@stop

<style>
    .newMatches {
        float: left;
        flex: 1;
        text-align: center;
    }

    .newMatches img {
        min-height: 55vmin;
        max-height: 55vmin;
        border-radius: 10px;
        float: left;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .info {
        float: left;
        display: block;
        clear: left;
        margin-bottom: 0;
    }

    .newMatch {
        display: inline-block;
    }

    .buttons {
        float: left;
        display: flex;
        clear: left;
        margin-top: 6%;
        text-align: center;
        margin-left: 20%;
    }
    .like{
        height: 10vmin;
        width: 10vmin;
        background-image: url("../images/like.png");
        background-repeat: no-repeat;
        background-size: 10vmin 10vmin;
        border-style: none;
        border-radius: 50px;
    }
    .dislike{
        margin-left: 40%;
        height: 10vmin;
        width: 10vmin;
        background-image: url("../images/dislike.png");
        background-repeat: no-repeat;
        background-size: 10vmin 10vmin;
        border-style: none;
        border-radius: 50px;
    }
</style>