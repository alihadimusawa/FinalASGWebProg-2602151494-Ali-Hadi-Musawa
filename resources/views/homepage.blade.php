<x-navbar />

<style>
    .top {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        align-self: center;
        padding-top: 5vh;
    }

    .homepage {
        background-color: #B069DB;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    .searchBar {
        width: 70%;
        background-color: #FEBE07;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        height: 7vh;
        border-radius: 10px;
    }

    .searchBar input {
        font-size: 1.4vw;
        color: #050172;
        font-weight: 500;
        width: 90%;
        height: 90%;
        border: transparent;
        background-color: transparent;
    }

    .searchBar img {
        width: 2vw;
        height: auto;
        margin-left: auto;
        cursor: pointer;
    }

    .top button:not(.searchBar) {
        width: 10%;
        height: 7vh;
        border: #050172 1px solid;
        border-radius: 10px;
        background-color: #FE0266;
        color: #050172;
        font-size: 1.2vw;
        font-weight: 600;
        cursor: pointer;
    }

    .top button:not(.searchBar):hover {
        background-color: #050172;
        color: #FE0266;
    }

    .usersContainer {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2vw;
        margin-top: 10vh;
    }

    .userCard {
        overflow: hidden;
        border: 4px solid white;
        border-radius: 10px;
        width: 25vw;
        color: white !important;
        font-size: 1.4vw;
        background-color: #050172;
        padding-top: 2vh;
    }

    .userContainerTop {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .userContainerTop img {
        width: 10vw;
        height: auto;
        border-radius: 100%;
        border: 2px solid white;
    }

    .hobbyContainer {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        color: #FEBE07;
        font-weight: 900;
    }

    .userContainerBottom {
        border-top: 4px solid white;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 1vw;
        background-color: #3F37C9;
    }

    .userContainerBottom button {
        background-color: #FE0266;
        border-radius: 10px;
        height: 6vh;
        width: 10vw;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        font-size: 1.5vw;
        color: white;
        cursor: pointer;
        border: 2px solid white;
    }

    .userContainerBottom button:hover {
        background-color: black;
    }

    .userContainerBottom img {
        width: 2vw;
    }
</style>

<div class="homepage">
    <div class="top">

        <button class="searchBar" aria-placeholder="Search..."> <input type="text" placeholder="Search..."><img src="{{asset ('/images/searchIcon.png') }}" alt="searchIcon"></button>

        <button>By Gender</button>

        <button>By Hobby</button>
    </div>

    <div class="usersContainer">
        @foreach($users as $user)
        @if($user->name != $currentUser->name)
        <div class="userCard">
            <div class="userContainerTop">
                @foreach($user->avatars as $avatar)
                @if($avatar->status == "active")
                <img src="{{$avatar->imageLink}}" alt="other user profile image">
                @endif
                @endforeach

                <p>{{$user->name}}</p>
                <div class="hobbyContainer">
                    <p>{{$user->hobby[0]->hobby}}</p>
                    <p>{{$user->hobby[1]->hobby}}</p>
                    <p>{{$user->hobby[2]->hobby}}</p>
                </div>
            </div>

            <div class="userContainerBottom">
                <button onclick="redirectInsta('{{$user->instagram}}')"><img src="{{asset('images/instagram.png')}}" alt="">Insta</button>

                <form id="likeForm" method="POST" action="/sendFriendRequest">
                    @csrf
                    <input type="hidden" name="targetId" id="targetId" value="{{$user->id}}">

                    <button type="submit"><img src="{{asset('images/like.png')}}" alt="">Like</button>
                </form>


            </div>
        </div>
        @endif
        @endforeach
    </div>

    <script>
        function redirectInsta(link) {
            window.location.href = link;
        }
    </script>
</div>