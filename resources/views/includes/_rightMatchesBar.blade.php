<div class="matchPairs">
    <h4>Your matches</h4>
    <h5>Click on a person to start chatting</h5>
    <ul>
        <div class="pairs">
            @foreach($pairs as $pair)
            <li><a href="../messages/{{$pair['id']}}">
                    <img src="../storage/{{$pair['profile_pic']}}" alt="fail">
                    {{$pair['name']}}, {{$pair['age']}}
            </li>
            @endforeach
        </div>
        <ul>
</div>


<style>
    h4 {
        text-align: center;
        font-size: large;
    }
    h5 {
        text-align: center;
        font-size: x-small;
    }

    .matchPairs {
        margin-top: 6%;
        margin-right: 3%;
        overflow-y: scroll;
        overflow: auto;
        float: right;

    }

    .pairs {
        display: inline-block;
        border-style: groove;
        border-color: transparent;
        background-color: lightblue;
        border-radius: 20px;
        padding: 3px;
    }

    .matchPairs img {
        min-height: 7vmin;
        max-height: 7vmin;
        border: 2px solid #FFF8FD;
        border-radius: 100px;
    }

    ul {
        list-style-type: none;
    }

    ul li a {
        float: left;
        margin: 5px;
        padding: 5px;

    }
</style>