<h1 class="section-heading">Beer</h1>
<hr></hr>
<div class='col-sm-6'>
    <h3 class="section-heading">House Pours</h3>
    <div class="housePourContainer">

<?php
$xml = simplexml_load_file("./xml/drinks.xml");
$totalGuestBeers = 10;
$visibleGuestBeers = 5;
$x = 0;
$hiddenClass = '';
foreach ($xml->housepours->housepour as $housepour){
    echo "<div class='housepour'><p> $housepour </p></div>";
}
?>

    </div>
</div>
<div class='col-sm-6 guestBeerContainer'>
<h3 class="section-heading">Guest Beers</h3>

<?php
    
foreach ($xml->beers->beer as $beer){
    if ($x > $visibleGuestBeers) {
        $hiddenClass = 'hiddenBeer';
    }
    
    if ($x < $totalGuestBeers) { 
        echo "<p class='guestbeer $hiddenClass'> $beer </p>";
    }
    $x++;
}
?>

<button type="button" id="showlist" class="btn btn-default mr center-block">Show fewer</button>
</div>