<x-navbar />

<style>
    .notifications {
        background-color: #050172;
        min-height: 100vh;
    }

    .notifications>div {
        background-color: #FE0266;
        width: 80%;
        border-radius: 20px;
        margin-top: 10vh;
        height: 80vh;
    }

    .notificationContainer {
        background-color: #B069DB;
    }

    .notifications,
    .notifications>div {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .notificationContainer {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        border-radius: 10px;
        padding: 0.8vw;

    }

    h3 {
        text-decoration: underline;
    }

    #profile {
        width: 5vw;
        height: auto;
        border-radius: 100000px;
        background-color: white;
    }

    #name {
        font-size: 1.2vw;
        font-weight: 900;
    }

    p:not(#name) {
        text-decoration: underline;
    }

    #cross {
        width: 2.8vw;
        margin-left: -5vw;
    }

    .notificationContainer button {
        cursor: pointer;
        background-color: transparent;
        border: transparent;
    }
</style>

<div class="notifications">
    <div>
        <h3>People who want to be your friends</h3>
        @foreach($friendsWaiting as $friendName => $friend)
        <div class="notificationContainer">
            <!-- Access the image link from the array -->
            <img id="profile" src="{{$friend['imageLink']}}" alt="image">
            <p id="name">{{$friendName}}</p>

            <!-- Loop through the first 3 hobbies for the current friend -->
            @foreach(array_slice($friend['hobbies'], 0, 3) as $hobby)
            <p>{{$hobby}}</p>
            @endforeach

            <form action="/addFriend" method="POST">
                <input type="hidden" name="friend" id="friend" value="{{$friendName}}">
                <button onclick="addFriend()"><img id="checklist" src="{{asset('images/checklist.png')}}" alt="checkist"></button>
            </form>

            <form action="/rejectFriend" method="DELETE">
                <input type="hidden" name="friend" id="friend" value="{{$friendName}}">
                <button onclick="rejectFriend()">
                    <img id="cross" src="{{asset('images/cross.png')}}" alt="cross">
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<script>
    function addFriend() {
        window.location
    }
</script>