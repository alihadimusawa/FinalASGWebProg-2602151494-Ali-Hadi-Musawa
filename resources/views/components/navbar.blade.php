<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialHop</title>

    <script>
        function logout(){
            window.location.href = "/logout";
        }

        function redirectProfile(){
            window.location.href = '/profile';
        }

        function redirectNotification(){
            window.location.href = '/notification';
        }

        function redirectHomepage(){
            window.location.href = "/homepage";
        }
    </script>
</head>

<style>
    body{
        padding: 0px;
        margin: 0;
    }
    nav{
        background-color: #3F37C9;
        border-bottom: 1vh solid #050172;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding:2vh;
        padding-left: 5vw;
        padding-right: 5vw;
    }

    nav img:not(#logo){
        width: 2vw;
        height: auto;
        background-color: white;
        border-radius: 50%;
        padding: 4px;
    }

    nav #logo{
        width: 10vw;
        cursor: pointer;
    }

    nav div{
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* border: 1px solid black; */
        width: 15vw;
    }

    nav div *{
        cursor: pointer;
    }

    nav div *:hover{
        background-color:#FEBE07 !important;
        color: #050172;
    }

    nav div button{
        border-radius: 10px;
        border: transparent;
        width: 6vw;
        height: 5vh;
        background-color: #050172;
        font-size: 1.2vw;
        font-weight: 600;
        color: #FEBE07;
    }
</style>

<body>
    <nav>
        <img onclick="redirectHomepage()" id="logo" src="{{ asset('images/logo2.png') }}" alt="My Image">
        <div>
            <img onclick="redirectProfile()" src="{{ asset('images/profile.png') }}" alt="My Image">
            <img onclick="redirectNotification()" src="{{ asset('images/notification.png') }}" alt="My Image">
            <button onclick="logout()">Logout</button>
        </div>
    </nav>
</body>

</html>