@extends('navbar.nav')

@section('content')
@include('includes._profileBar')
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
<button type="submit">Approve</button>
</form>
<form action="notApprove" method="post">
@csrf  
<input type="hidden" name="idToNotApprove" value="{{$match['id']}}">
<button type="submit">Not approve</button>
</form>
@else
<h2>Currently no new matches</h2>
@endif
</div>

@include('includes._rightMatchesBar')
@stop

<style>
    .newMatches{
        float:left;
        flex: 1;
    }
    .newMatches img{
        min-height: 50vmin;
        max-height: 50vmin;
    }
    .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
</style>