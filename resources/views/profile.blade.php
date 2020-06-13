@extends('navbar.nav')

@section('content')
@include('includes._profileBar')
<div class="profile">
    <div id="divInfo">
        <p class="info">Name: {{session('data')['name']}}</p>
        <a href="#" id="btnChangeName" class="button">Change name</a> <br> <br> <br>
        <a href="#" id="btnChangePassword" class="button">Change password</a> <br> <br> <br>
        <p class="info">Bio: {{session('data')['bio']}}</p>
        <a href="#" id="btnChangeBio" class="button">Update bio</a> <br> <br> <br>
        <a href="#" id="btnChangePicture" class="button">Change profile picture</a> <br> <br> <br>
        <div class="message">{{session('newChange')}}</div>
    </div>


    <div id="divChangeName">
        <p class="info">Change your name</p>
        <form action="updateName">
            @csrf
            <input type="text" name="newName" id="newName" placeholder="New name" class="textDecorationRight">
            <button type="submit" name="btnConfirmName" id="btnConfirmName" class="button">Confirm</button> <br> <br>
            <div id="status" class="textDecorationRight"></div>
        </form>
    </div>
    <div id="divChangePassword">
        <form action="changePassword">
            <p>Change your password</p>
            @csrf
            <input type="password" name="oldPassword" id="oldPassword" placeholder="Old password" class="textDecorationRight">
            <input type="password" name="newPassword" id="newPassword" placeholder="New password" class="textDecorationRight">
            <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm new password" class="textDecorationRight">
            <button type="submit" name="btnConfirmNewPassword" id="btnConfirmNewPassword" class="button">Confirm</button>
            <!--<input type="hidden" name="hdnSession" id="hdnSession" data-value={{session('data')['password']}} /> -->
        </form>
    </div>
    <div id="divChangeBio">
        <form action="updateBio">
            @csrf
            <input type="text" name="newBio" id="newBio" value="{{session('data')['bio']}}">
            <button type="submit" name="btnConfirmPassword" id="btnConfirmPassword" class="button">Confirm</button>
        </form>
    </div>
    <div id="divChangePicture">
        <form action="updatePicture" enctype="multipart/form-data" method="POST">
            <p>Change your profile picture</p>
            @csrf
            <input type="file" name="newPicture"><br>
            <button type="submit" name="btnConfirmNewPicture" id="btnConfirmNewPassword" class="button">Confirm</button> <br> <br>
        </form>
    </div>
    <div id="goBack">
        <a href="#" id="btnBack" class="button">Back to info</a> <br> <br> <br>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/profilePage.js"></script>
@include('includes._rightMatchesBar')
@stop


<style>
    .profile {
        float: left;
        flex: 1;
        text-decoration: none;
        margin-top: 3%;
        margin-left: 10%;
        color: maroon;
        font-family: cooper-black-std, serif;
        font-size: 3vmin;
        display: block;

    }

    .info {
        float: left;
    }

    .button {
        float: right;
        text-decoration: none;
        font-family: cooper-black-std, serif;
        background-color: maroon;
        color: white;
        padding: 6px 7px 6px 7px;
        font-size: 3vmin;
        margin-left: 17%;
        width: 43%;
        text-align: center;
    }

    .message {
        font-size: large;
        font-style: italic;
        text-align: center;
        margin-top: 10%;
        font-weight: bold;
    }
</style>