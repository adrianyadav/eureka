<?php

session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testing </title>
    <style>
        form input {
            width: 450px;
        }
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/bebasneue.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="icon" type="image/png"  href="./img/favicon.png">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/nav-footer.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container center-block">
<form method="post" class="form-inline" action="script.php">
    <fieldset>
        <?php
        $x = 0;
        $xml = simplexml_load_file("./xml/drinks.xml");
        foreach ($xml->beers->beer as $beer) {
            ?>

            <div class="pure-control-group">
                <label>
                    <input type='text' value='<?php echo $beer ?>' name='beer<?php echo $x++ ?>'>
                </label>

            </div>

            <?php
        }
        ?>
        <button type="submit" class="pure-button">Update</button>
    </fieldset>
</form>
</div>


<ul>
    <?php
    foreach ($xml->housepours->housepour as $housepour) {
        echo "<li> $housepour </li>";
    }
    ?>
</ul>


</body>
</html>