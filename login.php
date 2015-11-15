<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

<body class="align">

<div class="site__container">

    <div class="grid__container">

            <form name="login" method="post" action="php/verify.php" class="form form--login">


            <div class="form__field">
                <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
                <input id="login__username" type="text" name="username" class="form__input" id="username" placeholder="Username" required>
            </div>

            <div class="form__field">
                <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
                <input id="login__password" type="password" name="password" id="password" class="form__input" placeholder="Password" required>
            </div>

            <div class="form__field">
                <input type="submit" value="Sign In">
            </div>

        </form>

    </div>

</div>

</body>





</body>
</html>
