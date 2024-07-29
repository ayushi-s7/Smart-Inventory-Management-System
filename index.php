<?php 
    include("connection.php");
    include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        background: linear-gradient(to right, #87CEEB, #4682B4);
        font-family: 'Open Sans', sans-serif;
        color: #333; 
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #form {
        width: 25%;
        padding: 20px;
        border-radius: 5px;
        background: #fff; 
        border: 3px solid #8B008B; 
        box-sizing: border-box; 
    }

    h1 {
        text-align: center;
        color: #006400;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    #user,
    #pass {
        background-color: #f0f0f0; 
        border-radius: 3px;
        color: #333;
        margin-bottom: 1em;
        padding: 10px;
        width: calc(100% - 20px); 
        box-sizing: border-box;
    }

    #remember {
        margin-bottom: 1em;
        color: #555; 
    }

    #remember input {
        margin-right: 5px;
    }

    #btn {
        background: #ffa500; 
        border: 0;
        width: 100%;
        height: 40px;
        border-radius: 3px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    #btn:hover {
        background: #ff8c00; 
    }
</style>


</head>
<body>
    <div id="form">
        <h1>LOG IN</h1>
        <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
            <label>Email</label>
            <input type="text" id="user" name="user" placeholder="Username" required><br><br>
            <label>Password</label>
            <input type="password" id="pass" name="pass" placeholder="Password" required><br><br>
            <div id="remember">
                <input type="checkbox" value="lsRememberMe" id="rememberMe" style="display: inline-block;">
                <label>Remember me</label>
            </div>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
    </div>
    <script>
        function isvalid() {
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            if (user.length == "" && pass.length == "") {
                alert(" Username and password field are empty!!!");
                return false;
            } else if (user.length == "") {
                alert(" Username field is empty!!!");
                return false;
            } else if (pass.length == "") {
                alert(" Password field is empty!!!");
                return false;
            }
        }
    </script>
</body>
</html>
