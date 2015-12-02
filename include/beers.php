<h1 id="beer" class="section-heading">Beer</h1>
<hr>
<div class='col-sm-6'>
    <h3 class="section-heading">Guest Beers</h3>

    <div class="guestBeerContainer">

        <?php
        $xml = simplexml_load_file("./xml/drinks.xml");

        $beers = $xml->xpath('//beer');
        $totalGuestBeers = 0;
        foreach ($beers as $beer) {
            $totalGuestBeers++;
        }
        $hiddenClass = '';
        $x = 0;
        $y = 0;
        ?>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                foreach ($xml->beers->beer as $beer) {
                    if ($x == 0) {
                        echo "<li data-target='#myCarousel' class='active' data-slide-to='$x'></li>";
                    } else {
                        echo "<li data-target='#myCarousel' data-slide-to='$x'></li>";
                    }
                    $x++;

                }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <?php
                foreach ($xml->beers->beer as $beer) {
                    $description = $beer->description;
                    $beerImage = $beer;
                    $beerImage = preg_replace("/[^ \w]+/", "", $beerImage);
                    $beerImage = str_replace(' ', '_', $beerImage);
                    $beerImage = strtolower($beerImage);
                    $beerImage = "uploads/" . $beerImage . ".jpg";
                    if ($y == 0) {
                        echo "<div class='item active'>" ?>
                <?php
                        if (file_exists($beerImage)) {
                            echo "<img src='$beerImage' alt='$beer'>";
                        } else {
                       echo "<img src = 'img/beers.png' alt = '$beer' >";
                    }
                       echo " <div class='carousel-caption'>
                        <h3 class='carousel-desc'>$beer</h3>";
                        ?>
                        <?php
                          if (!empty($description)){
                            echo "<p class='carousel-desc'>$description</p>";
                          }
                        echo "</div> </div>";
                        ?>

                <?php
                    } else {
                        echo "<div class='item'>";
                        ?>
                <?php
                if (file_exists($beerImage)) {
                    echo "<img src='$beerImage' alt='$beer'>";
                } else {
                    echo "<img src = 'img/beers.png' alt = '$beer' >";
                }
                        echo "<div class='carousel-caption'>
                        <h3 class='carousel-desc'>$beer</h3>";
                        ?>
                        <?php
                         if (!empty($description)){
                            echo "<p class='carousel-desc'>$description</p>";
                          }
                        ?>
                        <?php
                        echo "</div> </div>";
                    }
                    $y++;

                }
                ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</div>

<div class='col-sm-6 housePourContainer'>
    <h3 class="section-heading">Mainstays</h3>
    <table class="table table-hover table-bordered">
        <tbody>
        <tr>
            <th> Housepour </th>
           <?php
           foreach ($xml->housepours->housepour as $housepour) {
               $description = $housepour->description;
               if (!empty($description)) echo " <th> Description </th>";
           }?>
        </tr>
    <?php
    foreach ($xml->housepours->housepour as $housepour) {
        $description = $housepour->description;

    ?>
       <tr>
           <td> <?php echo $housepour ?></td>
           <?php if (!empty($description)) echo " <td> $description </td>" ?>
           </tr>
    <?php } ?>
        </tbody>
    </table>

</div>
</div>