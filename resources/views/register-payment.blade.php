<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Hop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet">

    <script>
    const price = Math.ceil(Math.random() * (125000 - 100000 + 1)) + 100000;

    function generatePrice() {
        document.getElementById("registerPrice").innerHTML = `Register for only <span>Rp.${price}</span>`;
    }

    function validatePrice() {
        const userPrice = document.getElementById("money").value;
        let buttonType = "under";

        if (price < userPrice) {
            let amount = userPrice - price;
            document.getElementById("message").innerHTML = `Sorry you overpaid Rp.${amount}, would you like to continue?`;
            buttonType = 'over';
        } else if (price > userPrice) {
            let amount = price - userPrice;
            document.getElementById("message").innerHTML = `You are still underpaid Rp.${amount}`;
            buttonType = 'under';
        }

        if (buttonType == 'under') {
            document.getElementsByClassName('over')[0].style.visibility = "hidden";
            document.getElementsByClassName('under')[0].style.visibility = "visible";
        } else {
            document.getElementsByClassName('over')[0].style.visibility = "visible";
            document.getElementsByClassName('under')[0].style.visibility = "hidden";
        }

        document.getElementById("message").style.visibility = "visible";
    }

    function firstRender() {
        document.getElementsByClassName("over")[0].style.visibility = "hidden";
        document.getElementById("message").style.visibility = 'hidden';
    }

    function submitForm(){
        document.getElementById('priceForm').submit();
    }

    window.onload = function () {
        generatePrice();
        firstRender();
    };
</script>

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
        margin-bottom: 4vh;
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
        margin-bottom: 5vh;
        border-radius: 10px;
        padding-left: 1vw;
        border: transparent;
    }

    label {
        margin-top: 5vh;
        font-size: 2VW;
    }

    /* Ends here */

    .buttonContainer {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        width: 60%;
    }

    span{
        font-size: inherit;
        text-decoration: underline;
    }

    h1{
        font-weight: 100 !important;
    }
</style>

<body>
    <form action="/register-payment" method="POST" id="priceForm">
        @csrf
        <img src="{{ asset('images/Logo.png') }}" alt="My Image">
        <h1 id="registerPrice">Register for only Rp(random number) <br> Limited time only</h1>

        <label for="money">Enter some money</label>
        <input type="text" name="money" id="money" placeholder="Example: 200000">

        <input type="hidden" id="userId" name="userId" value="{{$userId}}">

        <h3 id="message">You are still underpaid (amount underpaid)</h3>

        <div class="buttonContainer under">
            <button type="button" onclick="validatePrice()">Pay</button>
        </div>

        <div class="buttonContainer over">
            <button type="button" onclick="submitForm()">Yes</button>
            <button type="button">No</button>
        </div>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>