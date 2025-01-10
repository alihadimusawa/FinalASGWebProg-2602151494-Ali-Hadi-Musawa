<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Hop</title>
    <script>
        // Function to validate Instagram account (URL format)
        function validateInstagram() {
            const instagram = document.querySelector('input[name="instagram"]').value;
            const instagramRegex = /^https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?$/;
            if (!instagramRegex.test(instagram)) {
                alert('Please enter a valid Instagram account in the format http://www.instagram.com/username');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // Function to validate mobile number (must be all digits)
        function validateMobile() {
            const mobile = document.querySelector('input[name="mobile"]').value;
            const mobileRegex = /^[0-9]+$/;
            if (!mobileRegex.test(mobile)) {
                alert('Please enter a valid mobile number with only digits.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        function validatePassword() {
            const password = document.querySelector('input[name="password"]').value;
            const confPassword = document.querySelector('input[name="confirm_password"]').value;
            if (confPassword == password) return true;
            alert("Password didn't match");
            return false;
        }

        // Function to validate hobbies
        function validateHobbies() {
            const hobbies = document.querySelectorAll('input[name="hobby[]"]:checked');
            if (hobbies.length < 3) {
                alert('Please select at least 3 hobbies.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // Combine validation for Instagram, Mobile, Password, and Hobbies
        function validateForm() {
            if (!validateInstagram() || !validateMobile() || !validatePassword() || !validateHobbies()) {
                return false; // Prevent form submission if any validation fails
            }
            return true; // Allow form submission
        }
    </script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+15&display=swap" rel="stylesheet">
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

    form * {
        width: 100%;
        font-size: 1vw;
        color: white;
        font-family: "Jersey 15", serif;
    }

    input,
    select,
    option {
        border: 1px solid black;
        color: black;
        height: 3vh;
        border-radius: 10px;
    }

    label {
        margin-top: 1vw;
        font-weight: 450;
    }

    #hobbiesLabel {
        text-align: center;
        text-decoration: underline;
    }

    #hobbiesContainer {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-self: center;
    }

    #hobbiesContainer input {
        width: 1vw;
    }

    button {
        margin-top: 5vh;
        width: 20%;
        height: 5vh;
        border: 1px solid black;
        border-radius: 10px;
        background-color: #B069DB;
        font-size: 1vw;
        cursor: pointer;
        border: 1px solid white;
    }

    button:hover {
        background-color: white;
        color: #B069DB;
    }

    img {
        width: 4vw;
    }

    p{
        text-align: center;
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

    <form action="/register-user" method="POST" onsubmit="return validateForm()">
        @csrf

        <img src="{{ asset('images/Logo.png') }}" alt="My Image">

        <label for="name">Name: </label>
        <input type="text" name="name" required>

        <label for="instagram">Instagram Account: </label>
        <input type="text" name="instagram" placeholder="Ex: https://www.instagram.com/username/" required>

        <label for="mobile">Mobile Number: </label>
        <input type="text" name="mobile" placeholder="Ex: 0812-3456-7890" required>

        <label for="status">Status: </label>
        <select name="status" required>
            <option value="single">Single</option>
            <option value="taken">Taken</option>
        </select>

        <label for="password">Password: </label>
        <input type="password" name="password" required>

        <label for="confirm_password">Confirm Password: </label>
        <input type="password" name="confirm_password" required>

        <label for="gender">Gender: </label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="hobbies" id="hobbiesLabel">Select at least 3 hobbies: </label><br>
        <div id="hobbiesContainer">
            <!-- Hobby options (at least 20) -->
            <div>
                <label><input type="checkbox" name="hobby[]" value="reading"> Reading</label><br>
                <label><input type="checkbox" name="hobby[]" value="sports"> Sports</label><br>
                <label><input type="checkbox" name="hobby[]" value="music"> Music</label><br>
                <label><input type="checkbox" name="hobby[]" value="traveling"> Traveling</label><br>
                <label><input type="checkbox" name="hobby[]" value="cooking"> Cooking</label><br>
                <label><input type="checkbox" name="hobby[]" value="painting"> Painting</label><br>
                <label><input type="checkbox" name="hobby[]" value="photography"> Photography</label><br>
                <label><input type="checkbox" name="hobby[]" value="gaming"> Gaming</label><br>
                <label><input type="checkbox" name="hobby[]" value="fishing"> Fishing</label><br>
                <label><input type="checkbox" name="hobby[]" value="writing"> Writing</label><br>
            </div>
            <div>
                <label><input type="checkbox" name="hobby[]" value="gardening"> Gardening</label><br>
                <label><input type="checkbox" name="hobby[]" value="dancing"> Dancing</label><br>
                <label><input type="checkbox" name="hobby[]" value="hiking"> Hiking</label><br>
                <label><input type="checkbox" name="hobby[]" value="swimming"> Swimming</label><br>
                <label><input type="checkbox" name="hobby[]" value="yoga"> Yoga</label><br>
                <label><input type="checkbox" name="hobby[]" value="cycling"> Cycling</label><br>
                <label><input type="checkbox" name="hobby[]" value="skiing"> Skiing</label><br>
                <label><input type="checkbox" name="hobby[]" value="running"> Running</label><br>
                <label><input type="checkbox" name="hobby[]" value="volunteering"> Volunteering</label><br>
                <label><input type="checkbox" name="hobby[]" value="watching_movies"> Watching Movies</label><br>
            </div>
        </div>

        <button type="submit" id="registerButton">Register</button>

        <p>Already have an account? <a href="/login">Login</a> here </p>
    </form>
</body>

</html>