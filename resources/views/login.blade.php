<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<style>
    body {
        background-color: #FEBE07;
        padding-left: 30vw;
        padding-right: 30vw;
        padding-top: 5vh;
    }

    form {
        width: 100%;
        height: 100%;
        border-radius: 20px;
        background-color: #FE0266;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2vw;
    }

    img {
        width: 4vw;
    }

    button {
        margin-top: 5vh;
        width: 10vw;
        height: 5vh;
        border: 1px solid black;
        border-radius: 10px;
        background-color: #B069DB;
        font-size: 1.5vw;
        cursor: pointer;
        border: 1px solid white;
    }

    button:hover {
        background-color: white;
        color: #B069DB;
    }

    * {
        width: 100%;
        font-size: 1vw;
        color: white;
        font-family: "Jersey 15", serif;
    }

    input {
        color: black;
        border-radius: 10px;
        padding-left: 1vw;
        border: transparent;
    }

    label {
        margin-top: 5vh;
        font-size: 2VW;
    }

    /* Ends here */
    p{
        text-align: center;
        margin-top: 5vh;
        color: black;
    }
    a{
        color: white;
    }

    a:hover{
        color: blue;
    }



</style>

<body>
    <form action="/login" method="POST" id="loginForm">
        @csrf
        <img src="{{ asset('images/Logo.png') }}" alt="My Image">

        <label for="money">Username</label>
        <input type="text" name="username" id="username" placeholder="Example: Ali Hadi Musawa">

        <label for="password">Password</label >
        <input type="password" name="password" id="password">

        <button type="submit">Login</button>

        <p>Didn't have an account yet? <a href="/register">Register</a> here</p>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>

</html>