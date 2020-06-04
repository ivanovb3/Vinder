<div class="profileBar">
    <img src="../storage/{{session('data')['profile_pic']}}" alt="fail">
    <p>{{session('data')['name']}}</p>
    <p>Matches: {{session('data')['matches']}}</p>
</div>

<style>
    .profileBar {
        width: 19%;
        height: 100%;
        float: left;
        position: relative;
        background-color: #A29D9E;
        border-right: 10px solid #BFB2B5; 
        color: #708090;
        margin-right: 4%;
    }
    .profileBar img{
        width: 60%;
        margin: 20%;
        border: 5px solid #FFF8FD;
        border-radius: 100px;
    }
    .profileBar p{
        color: #fff;
        text-align: center;
    }
</style>