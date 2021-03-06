<?php
    require_once('../utils/utility.php');
    require_once('../db/dbhelper.php');
    require_once('prosess_form_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: montserrat;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h1{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }

        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
            top: -5px;
            color: #2691d9;
        }

        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before{
            width: 100%;
        }

        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
        
        .sign_up_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .sign_up_link a{
            color: #2691d9;
            text-decoration: none;
        }

        .sign_up_link a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>LOGIN</h1>
        <h5 style="text-align: center; color: red;"><?=$smg?></h5>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="user" required="true" vlaue="<?=$user?>">
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass" required="true" minlength="6" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login">
            <!-- <div class="sign_up_link">
                <a href="changePass.php">?????i m???t kh???u</a>
            </div> -->
            <div class="sign_up_link">
                Not a member? <a href="signup.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>