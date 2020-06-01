

@extends('navbar.nav')

@section('content')
<div class="profileBar">
    <img src="storage/{{session('data')['profile_pic']}}" alt="fail">
    <p>{{session('data')['name']}}</p>
    <p>Matches: {{session('data')['matches']}}</p>
</div>


<div class="newMatches">
<h1>Your new matches:</h1>
<br> <br> <br>
@if($match)
<img src="storage/{{$match['profile_pic']}}" alt="fail">
<p>{{$match['name']}}, {{$match['age']}}</p>
<p>{{$match['bio']}}</p>
<form action="approve" method="post">
@csrf  
<input type="hidden" name="idToApprove" value="{{$match['id']}}">
<input type="submit" name="approveButton" value="Approve" class="approveBtn">
</form>
<form action="notApprove" method="post">
@csrf  
<input type="hidden" name="idToNotApprove" value="{{$match['id']}}">
<input type="submit" name="notApproveButton" value="Not Approve" class="notApproveBtn">
</form>
@else
<h2>Currently no new matches</h2>
@endif
</div>


@stop

<style>
    .profileBar {
        width: 17%;
        height: 100%;
        float: left;
        position: relative;
        background-color: #F0F8FF;
        border-right: 10px solid #FFF8FD;
        color: #708090;
        margin-right: 4%;
    }
    .profileBar img{
        width: 60%;
        margin: 20%;
        border: 5px solid #FFF8FD;
        border-radius: 100px;

    } 
    .newMatches img{
        min-height: 50vmin;
        max-height: 50vmin;
    }
</style>