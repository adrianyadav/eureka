<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We offer top quality New Zealand craft beers, housing 15 different and ever changing brews on tap. Specialities include Lunch, Dinner, Coffee and Drinks. Dunedin New Zealand">
    <meta name="author" content="">

    <title>Eureka Cafe &#38; Bar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/bebasneue.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

   <!-- Favicon -->
    <link rel="icon" type="image/png"  href="img/favicon.png">

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

    <?php include 'nav.php';?>

    <!-- Header -->
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <ul id="open">
                            <li class="subheading">Opening Hours</li>
                            <li>Monday to Wensday - 11:30am to 10pm</li>
                            <li>Thursday and Friday - 11:30am to late</li>
                            <li>Saturday - 10:30am to late</li>
                            <li>Sundays - 10:30am to 9pm </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Introduction</h2>
                    <p class="lead">Supposedly 'Eureka' means 'I have found it' and dont worry fair patrons, you have found it! With a mixture of personalities among our staff to make each wary traveler's experience a comfortable, unpretentious one might ask 'how can such a place exist?'
                    </p>

                    <p class="lead">
                        The answer is, it just does! So fine person who stumbled through our doors with glee or anticiaption, thank you for reading this far and welcome. Take a look around, make yourself known and explore our menus. Drool over our craft beers and wine, and relax. Eureka Season. Social. Simple.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->


    <div class="banner3">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    <div class="content-section-b">
    </div>

<!--
    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading"> Beers </h2>
                    <p class="lead">Beer information</p>
                </div>
                <div class="col-lg-5 col-lg-offset-1  col-sm-pull-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Guest Beers</h2>
                    <img src="img/moa.png" class="img-responsive">
                </div>
            </div>

        </div>
        
    </div>
-->




    <div class="banner4">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

    <div class="content-section-c center">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Latest Beers</h2>
                    <ul class="center-test" id="beers">
                        <?php include 'beers.php';?>
                        <button type="button" id="showlist" class="btn btn-default mr center-block">Show full list</button>

                        <script>
                            $(document).ready(function () {
                                $("#showlist").click(function () {
                                    $('li').removeClass('hidden');
                                    $('section-heading').removeClass('hidden');
                                });

                               

                            });
                        </script>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="banner2">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                </div>
            </div>

        </div>


    </div>
    <!-- /.content-section-a -->


    <div class="container center-form" id="contact">
        <div class="row">
            <form action="test.php" method="post">
                <div class="col-lg-12">
                    <h2> Send us  a message </h2>
                    <div class="form-group">
                        <label for="InputName">Your Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Your Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                    </div>
                    <div class="form-group">
                        <label for="InputMessage">Message</label>
                        <div class="input-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                    </div>
                    <div class="form-group">
                        <label for="InputReal">What is four + three? (Ensures your not a robot)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputReal" id="InputReal" required pattern=[7]>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                </div>
            </form>
            <hr class="featurette-divider hidden-lg">

        </div>

    </div>
    <!-- /.banner -->

   <?php include 'footer.php';?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>   

</html>