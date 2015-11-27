<?php
session_start();

if ($_SESSION["login"] != "true") {

    header("Location:login.php");

    $_SESSION["error"] = "<p> You don't have privileges to see the admin page.</p>";
    exit;

}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Admin Panel </title>
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
    <link rel="icon" type="image/png" href="./img/favicon.png">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/nav-footer.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Eureka Admin Page</h2>

                <p class="section-heading lead"> Here you can add, delete and edit existing beers and house pours.</p>
            </div>
        </div>

    </div>
</div>

<div class="container center-block admin">

    <form method="post" class="pure-form" action="php/script.php">
        <fieldset>
            <legend> Beers</legend>
            <?php
            $x = 0;
            $i = 0;
            $y = 0;
            $l = 0;
            $xml = simplexml_load_file("./xml/drinks.xml");
            foreach ($xml->beers->beer as $beer) {
                $description = $beer->description;
                ?>
                <label>
                    <input type='text' value='<?php echo $beer ?>' name='beer<?php echo $x++ ?>'>
                </label>
                <label>
                    <input type='text' placeholder="Enter Description of <?php echo $beer ?>"
                           value='<?php echo $description ?>' name='bdesc<?php echo $y++ ?>'>
                </label>

                <?php
            }
            ?>


            <legend> House pours</legend>
            <?php
            foreach ($xml->housepours->housepour as $housepour) {
                $description = $housepour->description;
                ?>
                <label>
                    <input type='text' value='<?php echo $housepour ?>' name='housepour<?php echo $i++ ?>'>
                </label>
                <label>
                    <input type='text' placeholder="Enter Description of <?php echo $housepour ?>"
                           value='<?php echo $description ?>' name='hdesc<?php echo $l++ ?>'>
                </label>
                <?php
            }

            ?>


            <button type="submit" class="pure-button btn">Update</button>
        </fieldset>

    </form>
    <form method="post" class="pure-form" action="php/addbeer.php">
        <fieldset>
            <legend> Add beer</legend>
            <label>
                <input type='text' placeholder='<?php echo "Enter beer here" ?>' name='beer<?php echo $x++ ?>'>
            </label>
            <button type="submit" class="pure-button btn">Add new beer</button>

        </fieldset>

    </form>

    </form>
    <form method="post" class="pure-form" action="php/addhousepour.php">
        <fieldset>
            <legend> Add housepour</legend>

            <label>
                <input type='text' placeholder='<?php echo "Enter housepour here" ?>'
                       name='housepour<?php echo $i++ ?>'>
            </label>
            <button type="submit" class="pure-button btn">Add new housepour</button>
        </fieldset>

    </form>

    <form action="upload.php" method="post" class="pure-form" enctype="multipart/form-data">
        <fieldset>
            <legend> Upload an image</legend>
            <p> Select the image as well as the associated Beer.
                If the upload is successful then the image for that beer will be replaced on the homepage.</p>
            <p> The images should be of type .jpg, if its not just rename the image. E.g. Test.png renamed to Test.jpg</p>
            <label> <input type="file" name="fileToUpload" id="fileToUpload"> </label>

            <select name="beer">
                <?php
                foreach ($xml->beers->beer as $beer) {
                    $uploadedBeer = $beer;
                    $uploadedBeer = preg_replace("/[^ \w]+/", "", $uploadedBeer);
                    $uploadedBeer = str_replace(' ', '_', $uploadedBeer);
                    $uploadedBeer = strtolower($uploadedBeer);
                ?>
                <option value="<?php echo $uploadedBeer ?>"> <?php echo $beer ?> </option>
                <?php } ?>
            </select>
            <button type="submit" class="pure-button btn">Upload image</button>
        </fieldset>
    </form>
</div>


<?php include 'include/footer.php'; ?>


</body>
</html>