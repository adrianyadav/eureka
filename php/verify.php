<?php

session_start();



$user = 'eurekadu';
$passw = 'goodbeer116';



if (($_POST["username"] == $user) and ($_POST["password"] == $passw)){

    $_SESSION["login"] = "true";

    header("Location: ../admin.php");

    exit;

} else {

    $_SESSION["error"] = "<p> Wrong username or password. Try again. </p>";
    header("Location:  ../login.php");

}



?>